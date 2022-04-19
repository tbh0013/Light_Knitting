-- 注文明細
CREATE TABLE order_details (
    order_detail_id serial NOT NULL ,
    order_id int NOT NULL ,
    product_id int NOT NULL ,
    product_size_id int NOT NULL ,
    quantity int NOT NULL ,
    is_deleted int NOT NULL DEFAULT 0  ,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);

CREATE UNIQUE INDEX order_details_PKI
  ON order_details(order_detail_id);

ALTER TABLE order_details
  ADD CONSTRAINT order_details_PKC PRIMARY KEY (order_detail_id);

-- 注文
CREATE TABLE orders (
    order_id serial NOT NULL ,
    customer_name varchar(255) NOT NULL ,
    mail varchar(255) NOT NULL ,
    post_code varchar DEFAULT NULL ,
    address varchar(255) DEFAULT NULL ,
    tel varchar(255) DEFAULT NULL ,
    is_deleted int NOT NULL DEFAULT 0  ,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);

CREATE UNIQUE INDEX orders_PKI
  ON orders(order_id);

ALTER TABLE orders
  ADD CONSTRAINT orders_PKC PRIMARY KEY (order_id);

-- ニュース
CREATE TABLE news (
    news_id serial NOT NULL,
    product_id int,
    date date DEFAULT NULL,
    title varchar(255) DEFAULT NULL,
    text text DEFAULT NULL,
    image_path varchar(255) DEFAULT NULL,
    url varchar(255) DEFAULT NULL,
    is_deleted int NOT NULL DEFAULT 0,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);

CREATE UNIQUE INDEX news_PKI
  ON news(news_id);

ALTER TABLE news
  ADD CONSTRAINT news_PKC PRIMARY KEY (news_id);

-- お問い合わせ
CREATE TABLE contacts (
    contact_id serial NOT NULL ,
    name varchar(255) DEFAULT NULL ,
    tel varchar(255) DEFAULT NULL ,
    mail varchar(255) DEFAULT NULL ,
    title varchar(255) DEFAULT NULL ,
    message text DEFAULT NULL ,
    is_deleted int NOT NULL DEFAULT 0  ,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);

CREATE UNIQUE INDEX contacts_PKI
  ON contacts(contact_id);

ALTER TABLE contacts
  ADD CONSTRAINT contacts_PKC PRIMARY KEY (contact_id);

-- カテゴリー
CREATE TABLE categories (
    category_id serial NOT NULL,
    name varchar(255) NOT NULL,
    is_deleted int NOT NULL DEFAULT 0,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);


CREATE UNIQUE INDEX categories_PKI
  ON categories(category_id);

ALTER TABLE categories
  ADD CONSTRAINT categories_PKC PRIMARY KEY (category_id);

-- 商品サイズ
CREATE TABLE product_sizes (
    product_size_id serial NOT NULL ,
    product_id int NOT NULL ,
    size_id int NOT NULL ,
    is_deleted int NOT NULL DEFAULT 0  ,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);

CREATE UNIQUE INDEX product_sizes_PKI
  ON product_sizes(product_size_id);

ALTER TABLE product_sizes
  ADD CONSTRAINT product_sizes_PKC PRIMARY KEY (product_size_id);

-- サイズ
CREATE TABLE sizes (
    size_id serial NOT NULL ,
    size_name varchar(255) NOT NULL ,
    is_deleted int NOT NULL DEFAULT 0  ,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);

CREATE UNIQUE INDEX sizes_PKI
  ON sizes(size_id);

ALTER TABLE sizes
  ADD CONSTRAINT sizes_PKC PRIMARY KEY (size_id);

-- 商品
CREATE TABLE products (
    product_id serial NOT NULL ,
    name varchar(255) NOT NULL ,
    price int NOT NULL ,
    category_id int NOT NULL ,
    image_path varchar(255) DEFAULT NULL ,
    sub_image_path varchar(255) DEFAULT NULL ,
    description varchar(255) DEFAULT NULL ,
    is_line_up int NOT NULL DEFAULT 0 ,
    is_deleted int NOT NULL DEFAULT 0  ,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone DEFAULT now() NOT NULL
);

CREATE UNIQUE INDEX products_PKI
  ON products(product_id);

ALTER TABLE products
  ADD CONSTRAINT products_PKC PRIMARY KEY (product_id);

ALTER TABLE order_details
  ADD CONSTRAINT order_details_FK1 FOREIGN KEY (product_size_id) REFERENCES product_sizes(product_size_id);

ALTER TABLE order_details
  ADD CONSTRAINT order_details_FK2 FOREIGN KEY (product_id) REFERENCES products(product_id);

ALTER TABLE order_details
  ADD CONSTRAINT order_details_FK3 FOREIGN KEY (order_id) REFERENCES orders(order_id);

CREATE INDEX products_IX1
  ON products(category_id);

CREATE INDEX product_sizes_IX1
  ON product_sizes(size_id);

ALTER TABLE product_sizes
  ADD CONSTRAINT product_sizes_FK1 FOREIGN KEY (product_id) REFERENCES products(product_id);
