-- todo: 外部キー制約を付ける

DROP DATABASE IF EXISTS knit_shop;
CREATE DATABASE IF NOT EXISTS knit_shop DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

-- 注文明細
CREATE TABLE order_details (
  order_detail_id INT not null COMMENT '注文明細ID'
  , order_id INT not null COMMENT '注文ID'
  , product_id INT not null COMMENT '商品ID'
  , product_size_id INT not null COMMENT '商品サイズID'
  , quantity INT not null COMMENT '数量'
  , is_deleted INT DEFAULT 0 not null COMMENT '削除フラグ'
  , created_at TIMESTAMP DEFAULT current_timestamp COMMENT '登録日付'
  , updated_at TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp COMMENT '更新日付'
  , CONSTRAINT order_details_PKC primary key (order_detail_id)
) COMMENT '注文明細' ;

-- 注文
CREATE TABLE orders (
  order_id INT not null COMMENT '注文ID'
  , customer_name VARCHAR(255) not null COMMENT 'お客様名'
  , mail VARCHAR(255) not null COMMENT 'メールアドレス'
  , post_code INT COMMENT '郵便番号'
  , addres VARCHAR(255) COMMENT '住所'
  , tel VARCHAR(255) COMMENT '電話番号'
  , is_deleted INT DEFAULT 0 not null COMMENT '削除フラグ'
  , created_at TIMESTAMP DEFAULT current_timestamp COMMENT '登録日付'
  , updated_at TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp COMMENT '更新日付'
  , CONSTRAINT orders_PKC primary key (order_id)
) COMMENT '注文' ;

-- ニュース
CREATE TABLE news (
  news_id INT not null COMMENT 'ニュースID'
  , date DATETIME COMMENT '日付'
  , title VARCHAR(255) COMMENT 'タイトル'
  , text TEXT COMMENT '内容'
  , image_path VARCHAR(255) COMMENT '画像パス'
  , url VARCHAR(255) COMMENT 'リンク'
  , is_deleted INT DEFAULT 0 not null COMMENT '削除フラグ'
  , created_at TIMESTAMP DEFAULT current_timestamp COMMENT '登録日付'
  , updated_at TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp COMMENT '更新日付'
  , CONSTRAINT news_PKC primary key (news_id)
) COMMENT 'ニュース' ;

-- お問い合わせ
CREATE TABLE contacts (
  contact_id INT not null COMMENT 'お問い合わせID'
  , name VARCHAR(255) COMMENT '名前'
  , tel VARCHAR(255) COMMENT '電話番号'
  , mail VARCHAR(255) COMMENT 'メールアドレス'
  , title VARCHAR(255) COMMENT '件名'
  , message TEXT COMMENT 'お問い合わせ内容'
  , is_deleted INT DEFAULT 0 not null COMMENT '削除フラグ'
  , created_at TIMESTAMP DEFAULT current_timestamp COMMENT '登録日付'
  , updated_at TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp COMMENT '更新日付'
  , CONSTRAINT CONTACTS_PKC primary key (contact_id)
) COMMENT 'お問い合わせ' ;

-- カテゴリー
CREATE TABLE categories (
  category_id INT not null COMMENT 'カテゴリーID'
  , name VARCHAR(255) not null COMMENT 'カテゴリー名'
  , is_deleted INT DEFAULT 0 not null COMMENT '削除フラグ'
  , created_at TIMESTAMP DEFAULT current_timestamp COMMENT '登録日付'
  , updated_at TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp COMMENT '更新日付'
  , CONSTRAINT categories_PKC primary key (category_id)
) COMMENT 'カテゴリー' ;

-- 商品サイズ
CREATE TABLE product_sizes (
  product_size_id INT not null COMMENT '商品サイズID'
  , product_id INT not null COMMENT '商品ID'
  , size_id INT not null COMMENT 'サイズID'
  , is_deleted INT DEFAULT 0 not null COMMENT '削除フラグ'
  , created_at TIMESTAMP DEFAULT current_timestamp COMMENT '登録日付'
  , updated_at TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp COMMENT '更新日付'
  , CONSTRAINT product_sizes_PKC primary key (product_size_id)
) COMMENT '商品サイズ' ;

-- サイズ
CREATE TABLE sizes (
  size_ud INT not null COMMENT 'サイズID'
  , size_name VARCHAR(255) not null COMMENT 'サイズ名'
  , is_deleted INT DEFAULT 0 not null COMMENT '削除フラグ'
  , created_at TIMESTAMP DEFAULT current_timestamp COMMENT '登録日付'
  , updated_at TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp COMMENT '更新日付'
  , CONSTRAINT sizes_PKC primary key (size_ud)
) COMMENT 'サイズ' ;

-- 商品
CREATE TABLE products (
  product_id INT not null COMMENT '商品ID'
  , name VARCHAR(255) not null COMMENT '商品名'
  , price INT not null COMMENT '値段'
  , catogry_id INT not null COMMENT 'カテゴリID'
  , image_path VARCHAR(255) COMMENT '商品画像パス'
  , description VARCHAR(255) COMMENT '説明'
  , is_line_up INT DEFAULT 0 not null COMMENT 'ラインナップフラグ'
  , is_deleted INT DEFAULT 0 not null COMMENT '削除フラグ'
  , created_at TIMESTAMP DEFAULT current_timestamp COMMENT '登録日付'
  , updated_at TIMESTAMP DEFAULT current_timestamp ON UPDATE current_timestamp COMMENT '更新日付'
  , CONSTRAINT products_PKC primary key (product_id)
) COMMENT '商品' ;
