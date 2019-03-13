<?php
include_once 'DBConnection.php';

class TRXStatus {
    const PENDING = 0;
    const REJECTED = -1;
    const APPROVED = 1;
}

class BRINETS_DBConnection extends DBConnection {
    public function __construct() {
        parent::__construct();
    }
    public function __destruct() {
        parent::__destruct();
    }

    public function create_user(array $params): int {
        $sql = "INSERT INTO user (firstname, lastname, email, password, role) VALUES (:firstname, :lastname, :email, :password, :role)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":firstname", $params['firstname']);
        $stmt->bindParam(":lastname", $params['lastname']);
        $stmt->bindParam(":email", $params['email']);
        $stmt->bindParam(":password", $params['password']);
        $stmt->bindParam(":role", $params['role']);

        if ($stmt->execute()) {
            $sql = "SELECT `userID` FROM user WHERE email = :email AND password = :password";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":email", $params['email']);
            $stmt->bindParam(":password", $params['password']);
            if ($stmt->execute()) {
                $data = $stmt->fetchAll();
                return $data[0]['userID'];
            } else {
                return -1;
            }
        } else {
            return -1;
        }
    }

    public function delete_user(int $user_id): bool {
        $sql = "DELETE FROM user WHERE userID = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":user_id", $user_id);
        return $stmt->execute();
    }

    public function retrieve_user(int $user_id): array{
        $sql = "SELECT * FROM user WHERE userID = :user_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":user_id", $user_id);

        if ($stmt->execute()):
            $data = $stmt->fetchAll();
            return $data;
        else:
            throw new Exception("Cannot execute SQL statement");
        endif;
    }

    public function retrieve_users(): array{
        $sql = "SELECT * FROM user";

        $stmt = $this->pdo->prepare($sql);

        if ($stmt->execute()):
            $data = $stmt->fetchAll();
            return $data;
        else:
            throw new Exception("Cannot execute SQL statement");
        endif;
    }

    public function update_user(int $user_id, array $params): bool {
        if (empty($params)) {
            return false;
        }

        $set = "";
        if (isset($params['firstname'])) {
            $set = $set . "firstname=:firstname, ";
        }
        if (isset($params['lastname'])) {
            $set = $set . "lastname=:lastname, ";
        }
        if (isset($params['role'])) {
            $set = $set . "role=:role, ";
        }
        if (isset($params['email'])) {
            $set = $set . "email=:email, ";
        }
        if (isset($params['password'])) {
            $set = $set . "password=:password, ";
        }
        $set = substr($set, 0, -2);

        $sql = sprintf("UPDATE `user` SET %s WHERE `userID` = :userID", $set);

        echo $sql;
        print_r($params);

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":userID", $user_id);
        if (isset($params['firstname'])) {
            $stmt->bindParam(":firstname", $params['firstname']);
        }

        if (isset($params['lastname'])) {
            $stmt->bindParam(":lastname", $params['lastname']);
        }

        if (isset($params['role'])) {
            $stmt->bindParam(":role", $params['role']);
        }

        if (isset($params['email'])) {
            $stmt->bindParam(":email", $params['email']);
        }

        if (isset($params['password'])) {
            $stmt->bindParam(":password", $params['password']);
        }

        return $stmt->execute();
    }

    public function create_transaction(int $trxID, array $params): bool {
        $sql = "INSERT INTO transaction (trxID, custID, tellerID, trxAmount) VALUES (:trxID, :custID, :tellerID, :trxAmount)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":trxID", $firstname);
        $stmt->bindParam(":custID", $params['custID']);
        $stmt->bindParam(":tellerID", $params['tellerID']);
        $stmt->bindParam(":trxAmount", $params['trxAmount']);

        return $stmt->execute();
    }

    public function delete_transaction(int $trxID): bool {
        $sql = "DELETE FROM transaction WHERE trxID = :trx_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":trx_id", $trxID);
        return $stmt->execute();
    }

    public function retrieve_transaction(int $trxID): array{
        $sql = "SELECT * FROM transaction WHERE trxID = :trx_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":trx_id", $trxID);

        if ($stmt->execute()):
            $data = $stmt->fetchAll();
            return $data;
        else:
            throw new Exception("Cannot execute SQL statement");
        endif;

    }

    public function retrieve_pendingTransaction(int $trxID): array{
        $sql = "SELECT * FROM transaction WHERE trxID = :trx_id, status = :pending";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":trx_id", $trxID);
        $stmt->bindParam(":pending", TRXStatus::PENDING);

        if ($stmt->execute()):
            $data = $stmt->fetchAll();
            return $data;
        else:
            throw new Exception("Cannot execute SQL statement");
        endif;

    }

    public function retrieve_transactionStatus(int $trxID): int {
        $sql = "SELECT status FROM transaction WHERE trxID = :trx_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":trx_id", $trxID);

        if ($stmt->execute()):
            $data = $stmt->fetchColumn();
            return $data;
        else:
            throw new Exception("Cannot execute SQL statement");
        endif;

    }

    public function approve_transaction(int $trxID, int $spvID): bool {
        $sql = "UPDATE transaction SET status=:status, spvID=:spvID WHERE trxID = :trx_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":trx_id", $trxID);
        $stmt->bindParam(":spvID", $spvID);
        $status = TRXStatus::APPROVED;
        $stmt->bindParam(":status", $status);
        return $stmt->execute();
    }

    public function reject_transaction(int $trxID, int $spvID): bool {
        $sql = "UPDATE transaction SET status=:status, spvID=:spvID WHERE trxID = :trx_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":trx_id", $trxID);
        $stmt->bindParam(":spvID", $spvID);
        $status = TRXStatus::REJECTED;
        $stmt->bindParam(":status", $status);
        return $stmt->execute();
    }

}