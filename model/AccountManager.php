<?php

class AccountManager extends ModelManager
{
    public function find($accountId)
    {
        $db = $this->db;
        $query = 'SELECT *
                  FROM account
                  WHERE account.id = :id';
        $req = $db->prepare($query);
        $req->bindValue(':id', $accountId, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
        $account = new Account();
        $account->setId($row['id']);
        $account->setId($row['id']);
        $account->setUsername($row['username']);
        $account->setPassword($row['password']);
        $account->setIsApproved($row['is_approved']);
        $account->setRole($row['role']);

        return $account;
    }

    public function findAll()
    {
        $accounts = [];
        $db = $this->db;

        $query = 'SELECT *
                  FROM account';
        $req = $db->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $account = new Account();
            $account->setId($row['id']);
            $account->setUsername($row['username']);
            $account->setPassword($row['password']);
            $account->setIsApproved($row['is_approved']);
            $account->setRole($row['role']);
            $accounts[] = $account;
        }

        return $accounts;
    }

    public function findOtherAdminAccounts($currentUserId)
    {
        $accounts = [];
        $db = $this->db;
        $currentUserId = (int)$currentUserId;

        $query = "SELECT *
                  FROM account
                  WHERE account.role = 'Admin'
                  AND account.id != :currentUserId";
        $req = $db->prepare($query);
        $req->bindValue(':currentUserId', $currentUserId, PDO::PARAM_INT);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $account = new Account();
            $account->setId($row['id']);
            $account->setUsername($row['username']);
            $account->setPassword($row['password']);
            $account->setIsApproved($row['is_approved']);
            $account->setRole($row['role']);
            $accounts[] = $account;
        }

        return $accounts;
    }

    public function promote($id)
    {
        $db = $this->db;
        $query = "UPDATE account 
                  SET is_approved = NOW(), role = 'Admin'
                  WHERE id = :id";
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function decrease($id)
    {
        $db = $this->db;
        $query = "UPDATE account 
                  SET is_approved = NULL, role = 'Abonné'
                  WHERE id = :id";
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

}