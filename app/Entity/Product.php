<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Product{

  /**
   * Nome do product
   * @var string
   */
  public $name;

  /**
   * SKU do product
   * @var string
   */
  public $sku;

  /**
   * price do product
   * @var string
   */
  public $price;

  /**
   * description do product
   * @var string
   */
  public $description;

  /**
   * quantity do product
   * @var string
   */
  public $quantity;



  /**
   * Método responsável por cadastrar uma nova product no banco
   * @return boolean
   */
  public function onSave(){
    //INSERIR O PRODUCT NO BANCO
    $obDatabase = new Database('tbl_product');
    $this->sku = $obDatabase->insert([
                                      'name'            => $this->name,
                                      'sku'             => $this->sku,
                                      'price'           => $this->price,
                                      'description'     => $this->description,
                                      'quantity'        => $this->quantity,
                                      'category'        => $this->category
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar o product no banco
   * @return boolean
   */
  public function onEdit(){
    return (new Database('tbl_product'))->update('sku = '.$this->sku,[
                                                                      'name'            => $this->name,
                                                                      'sku'             => $this->sku,
                                                                      'price'           => $this->price,
                                                                      'description'     => $this->description,
                                                                      'quantity'        => $this->quantity,
                                                                      'category'        => $this->category
                                                                    ]);
  }

  /**
   * Método responsável por excluir o product do banco
   * @return boolean
   */
  public function onDelete(){
    return (new Database('tbl_product'))->delete('sku = '.$this->sku);
  }

  /**
   * Método responsável por obter os products do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getProducts($where = null, $order = null, $limit = null){
    return (new Database('tbl_product'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar um product com base em seu SKU
   * @param  string $sku
   * @return Product
   */
  public static function getProduct($sku){
    return (new Database('tbl_product'))->select('sku = '.$sku)
                                  ->fetchObject(self::class);
  }

}