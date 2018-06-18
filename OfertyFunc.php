<?php

Class Oferty
{
    public function fetch_all()
    {
        global  $polaczenie;
        
        $query = $polaczenie->prepare("SELECT * FROM pokoj");
        $query->execute();
        
        return $query->fetchAll();
    }
    public function fetch_data($id_pokoju) {
        global $polaczenie;
        
        $query = $polaczenie->prepare("SELECT * FROM pokoj WHERE id_pokoju = ?");
        $query->bindValue(1, $id_pokoju);
        $query->execute();
        
        return $query->fetch();
    
    }
    public function fetch_rezerwacja($id_klienta) {
        global $polaczenie;
        
        $query = $polaczenie->prepare("SELECT * FROM rezerwacja WHERE _id_klienta = ? ");
        $query->bindValue(1, $id_klienta);
        $query->execute();
        
        return $query->fetch();
    
    }
    public function fetch_kod($email) {
        global $polaczenie;
        
        $query = $polaczenie->prepare("SELECT id_klienta FROM klient WHERE emailKlienta = ? ");
        $query->bindValue(1, $email);
        $query->execute();
        
        return $query->fetch();
    
    }
}

