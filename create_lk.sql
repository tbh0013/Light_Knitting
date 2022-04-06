CREATE DATABASE light_knitting;

CREATE TABLE light_knitting.categories (
    `category_id` int(11) NOT NULL COMMENT 'カテゴリーID',
    `name` varchar(255) NOT NULL COMMENT 'カテゴリー名',
    `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='カテゴリー';

CREATE TABLE light_knitting.contacts (
    `contact_id` int(11) NOT NULL COMMENT 'お問い合わせID',
    `name` varchar(255) DEFAULT NULL COMMENT '名前',
    `tel` varchar(255) DEFAULT NULL COMMENT '電話番号',
    `mail` varchar(255) DEFAULT NULL COMMENT 'メールアドレス',
    `title` varchar(255) DEFAULT NULL COMMENT '件名',
    `message` text DEFAULT NULL COMMENT 'お問い合わせ内容',
    `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='お問い合わせ';

CREATE TABLE light_knitting.news (
    `news_id` int(11) NOT NULL COMMENT 'ニュースID',
    `product_id` int(11) NOT NULL COMMENT '商品ID',
    `date` date DEFAULT NULL COMMENT '日付',
    `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
    `text` text DEFAULT NULL COMMENT '内容',
    `image_path` varchar(255) DEFAULT NULL COMMENT '画像パス',
    `url` varchar(255) DEFAULT NULL COMMENT 'リンク',
    `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ニュース';

CREATE TABLE light_knitting.orders (
    `order_id` int(11) NOT NULL COMMENT '注文ID',
    `customer_name` varchar(255) NOT NULL COMMENT 'お客様名',
    `mail` varchar(255) NOT NULL COMMENT 'メールアドレス',
    `post_code` varchar(11) DEFAULT NULL COMMENT '郵便番号',
    `address` varchar(255) DEFAULT NULL COMMENT '住所',
    `tel` varchar(255) DEFAULT NULL COMMENT '電話番号',
    `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='注文';

CREATE TABLE light_knitting.order_details (
    `order_detail_id` int(11) NOT NULL COMMENT '注文明細ID',
    `order_id` int(11) NOT NULL COMMENT '注文ID',
    `product_id` int(11) NOT NULL COMMENT '商品ID',
    `product_size_id` int(11) NOT NULL COMMENT '商品サイズID',
    `quantity` int(11) NOT NULL COMMENT '数量',
    `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='注文明細';

CREATE TABLE light_knitting.products (
    `product_id` int(11) NOT NULL COMMENT '商品ID',
    `name` varchar(255) NOT NULL COMMENT '商品名',
    `price` int(11) NOT NULL COMMENT '値段',
    `category_id` int(11) NOT NULL COMMENT 'カテゴリID',
    `image_path` varchar(255) DEFAULT NULL COMMENT '商品画像パス',
    `sub_image_path` varchar(255) DEFAULT NULL COMMENT 'サブ商品画像パス',
    `description` varchar(255) DEFAULT NULL COMMENT '説明',
    `is_line_up` int(11) NOT NULL DEFAULT 0 COMMENT 'ラインナップフラグ',
    `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品';

CREATE TABLE light_knitting.product_sizes (
    `product_size_id` int(11) NOT NULL COMMENT '商品サイズID',
    `product_id` int(11) NOT NULL COMMENT '商品ID',
    `size_id` int(11) NOT NULL COMMENT 'サイズID',
    `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品サイズ';

CREATE TABLE light_knitting.sizes (
    `size_id` int(11) NOT NULL COMMENT 'サイズID',
    `size_name` varchar(255) NOT NULL COMMENT 'サイズ名',
    `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '削除フラグ',
    `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '登録日付',
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新日付'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='サイズ';

ALTER TABLE light_knitting.categories
    ADD PRIMARY KEY (`category_id`);

ALTER TABLE light_knitting.contacts
    ADD PRIMARY KEY (`contact_id`);

ALTER TABLE light_knitting.news
    ADD PRIMARY KEY (`news_id`);

ALTER TABLE light_knitting.orders
    ADD PRIMARY KEY (`order_id`);

ALTER TABLE light_knitting.order_details
    ADD PRIMARY KEY (`order_detail_id`);

ALTER TABLE light_knitting.products
    ADD PRIMARY KEY (`product_id`);

ALTER TABLE light_knitting.product_sizes
    ADD PRIMARY KEY (`product_size_id`);

ALTER TABLE light_knitting.sizes
    ADD PRIMARY KEY (`size_id`);

ALTER TABLE light_knitting.categories
    MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'カテゴリーID', AUTO_INCREMENT=13;

ALTER TABLE light_knitting.contacts
    MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'お問い合わせID', AUTO_INCREMENT=10;

ALTER TABLE light_knitting.news
    MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ニュースID', AUTO_INCREMENT=23;

ALTER TABLE light_knitting.orders
    MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '注文ID', AUTO_INCREMENT=25;

ALTER TABLE light_knitting.order_details
    MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '注文明細ID', AUTO_INCREMENT=48;

ALTER TABLE light_knitting.products
    MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品ID', AUTO_INCREMENT=53;

ALTER TABLE light_knitting.sizes
    MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'サイズID', AUTO_INCREMENT=12;
COMMIT;




