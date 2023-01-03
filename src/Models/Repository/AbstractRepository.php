<?php

namespace App\Models\Repository;

use App\Models\DataObject\AbstractDataObject;
use App\Models\DataObject\Voiture;
use PDOException;

abstract class AbstractRepository
{
    protected abstract function getNomTable() : string;
    protected abstract function getNomClePrimaire(): string;
    protected abstract function getNomColonnes(): array;
    protected abstract function builder(array $objetFormatTableau);

    public function selectAll(): array
    {
        $tab = [];

        $model = DatabaseConnection::getInstance();
        $pdoStatement = $model->query('SELECT * FROM '.$this->getNomTable());
        foreach ($pdoStatement as $tableau){
            $tab[] = $this->builder($tableau);
        }
        return $tab;
    }

    public function select($var): ?AbstractDataObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM '.$this->getNomTable().' WHERE '.$this->getNomClePrimaire().'=?');
            $request->execute(array($var));
            $allObjects = $request->fetchAll();
        } catch (PDOException $e){
            echo $e->getMessage();
            return null;
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($allObjects))
            return null;

        $v = $allObjects[0];
        return $this->builder($v);
    }

    public function delete($var) : bool
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('DELETE FROM '.$this->getNomTable().' WHERE '.$this->getNomClePrimaire().'=?');
            return $request->execute(array($var));

        } catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function create(AbstractDataObject $object): bool
    {
        $tab = $object->formatTableau();
        $data = '';
        $data2 = [];
        $str = '';


        foreach ($tab as $cle => $value){
            if(strcmp($cle, "id")){
                $str = $str.$cle.', ';
                $data = $data.'?,';
                $data2[] = $value;
            }
        }
        $str = substr($str,0, -2);
        $data = substr($data,0, -1);

        $query = 'INSERT INTO '.$this->getNomTable().'('.$str.') VALUES('.$data.')';
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare($query);
            return $request->execute($data2);
        } catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function update(AbstractDataObject $object, $primary) : bool
    {
        $tab = $object->formatTableau();
        $data = [];
        $str = '';
        foreach ($tab as $cle => $value){
            if(strcmp($cle, "id")){
                $str = $str.$cle.'=?, ';
                $data[] = $value;
            }

        }
        $data[] = $primary;

        $str = substr($str,0, -2);
        $query = 'UPDATE '.$this->getNomTable().' SET '.$str.' WHERE '.$this->getNomClePrimaire().'=?';

        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare($query);
            $request->execute($data);
            return true;
        } catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}