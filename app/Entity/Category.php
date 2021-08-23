<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Category{

  /**
   * Identificador único da category
   * @var integer
   */
  public $id;

  /**
   * name da category
   * @var string
   */
  public $name;

  /**
   * Método responsável por cadastrar uma nova category no banco
   * @return boolean
   */
  public function onSave(){
    //INSERIR A CATEGORY NO BANCO
    $obDatabase = new Database('tbl_category');
    $this->id = $obDatabase->insert(['name'    => $this->name]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a category no banco
   * @return boolean
   */
  public function onEdit(){
    return (new Database('tbl_category'))->update('id = '.$this->id,['name'    => $this->name]);
  }

  /**
   * Método responsável por excluir a category do banco
   * @return boolean
   */
  public function onDelete(){
    return (new Database('tbl_category'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter as category do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getCategories($where = null, $order = null, $limit = null){
    return (new Database('tbl_category'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma category com base em seu ID
   * @param  integer $id
   * @return Category
   */
  public static function getCategory($id){
    return (new Database('tbl_category'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}