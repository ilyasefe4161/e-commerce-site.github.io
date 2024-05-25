<table width="1120" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="50">
        <td align="left" style="border-bottom: 1px dashed #ccc;">&nbsp;
            <style>
                /* CSS stilleri burada yer alabilir */
                body {
                    font-family: Arial, sans-serif;
                }

                header {
                    background-color: #333;
                    color: #fff;
                    padding: 20px;
                    text-align: center;
                }

                h1 {
                    margin: 0;
                }

                .container {
                    max-width: 960px;
                    margin: 0 auto;
                    padding: 20px;
                }

                .product-list {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    gap: 20px;
                }

                .product {
                    background-color: #f9f9f9;
                    padding: 20px;
                    text-align: center;
                    width: 200px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                .product img {
                    max-width: 100%;
                    height: auto;
                }

                .product h3 {
                    margin-top: 10px;
                }
            </style>
            <header>
                <h1>SOME PRODUCTS</h1>
            </header>
            <div class="container">
                <h2>Products</h2>
                <div class="product-list">
                    <?php
                    // Ürünleri veritabanından veya başka bir kaynaktan alınabilir
                    $products = [
                        [
                            'name' => 'Laptop',
                            'image' => 'Pictures/ProductsPictures/laptop/GF63-Thin-9SCXR.jpg',
                            'price' => '2000'
                        ],
                        [
                            'name' => 'Desktop Computer',
                            'image' => 'Pictures/ProductsPictures/desktopcomputer/OMEN25LGAMINGDESKTOP.jpeg',
                            'price' => '2500'
                        ],
                        [
                            'name' => 'Computer Equipment',
                            'image' => 'Pictures/ProductsPictures/computerequipment/logitech-blue-wireless-mouse.jpg',
                            'price' => '1800'
                        ]
                    ];

                    foreach ($products as $product) {
                        echo '<div class="product">';
                        echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
                        echo '<h3>' . $product['name'] . '</h3>';
                        echo '<p>Price: $' . $product['price'] . '</p>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>




        </td>
    </tr>
    <tr>
        <td align="left">&nbsp;</td>
    </tr>
</table>