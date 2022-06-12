## 關於 電子商務

此專案使用 Laravel 所打造的，供初學者學習與參考.

## 環境建置

- php: "^7.\*"
- mysql: 5.7

## 功能

* 前台:
```
1.用戶會員系統
2.查詢商品、加入購物車
3.下訂單購買、查詢訂單狀態
4.金流串接、優惠折扣等功能
```

* 後台:
```
1. 子帳號管理
2. 網站設定、類別、品牌、產品、優惠
3. 訂單管理功能
4. 銷售額報告
```

## 設置

- cp .env.example .env
- composer install.
- php artisan migrate.
- php artisan db:seed.
