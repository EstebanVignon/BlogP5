<?php

class AccountManager extends ModelManager
{

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
        $currentUserId = (int) $currentUserId;

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

}