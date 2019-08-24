<?php

$name = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : null;
$phone = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : null;

if ($_POST['name'] && $_POST['phone']) {

	$productList = array ( //массив с товарами
		0 => array ( //описание одного товара
					   'goodID' => $_POST["product_id"], //номер товара из LeadVertex
						'name' => $_POST["product_name"],          	//название товара
					   'quantity' => 1,       	//количество товара
					   'price' => floatval($_POST["price"]) //цена товара
		)
);
$data = array(
		'phone' => $_POST["phone"], //телефон клиента
		'fio' => $_POST["name"], //имя клиента
		'quantity' => 1, //количество товара общее
		'price' => floatval($_POST["price"]), //цена товара
'total' => floatval($_POST["price"]), //общая сумма заказа
'comment' => $_POST["product_name"], //в комментариях дублируем название товара
'goods' => $productList //прикрепляем список товаров
);
$myCurl = curl_init();
curl_setopt_array($myCurl, array(
		CURLOPT_URL => 'https://antena.leadvertex.ru/api/admin/addOrder.html?token=dfshshsdaf5t4fgve3',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_POSTFIELDS => http_build_query($data),
));
$response = curl_exec($myCurl);
}
?>

<!-- Thank template -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=hebrew" rel="stylesheet">
    <title>Ваш заказ принят в обработку</title>
  <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2245700345520389');
  fbq('track', 'Lead');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2245700345520389&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>
<body>
<?php $class = (!empty($products)) ? 'el-full' : 'el-only-thank'?>
    <div class="el-inner-content <?=$class?>">
        <div class="el-thank-column">
            <div class="el-content">
                <div class="el-main-animation">
                    <div class="a">
                        <div class="avatar">
                            <svg id="Camada_1" width="200px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 251.5 430.6" enable-background="new 0 0 251.5 430.6" xml:space="preserve">
              <g id="camisacostas">
                  <path fill="#383838" d="M127.7,186.5c-8.3,0-23.5-7.9-25-13c-0.3-1.1,0.1-2.1,1.2-2.8c2.9-1.8,7.9-2.8,15-2.8        c8.2,0,16.5,1.3,17.5,1.5c0,0.8-0.4,6-3.4,14.4C132.3,185.6,130.6,186.5,127.7,186.5C127.7,186.5,127.7,186.5,127.7,186.5z"></path>
                  <path fill="#2D2D2D" d="M118.8,168c8,0,16,1.2,17.4,1.4c-0.1,1.1-0.5,6.1-3.4,14.2c-0.6,1.7-2.3,2.6-5.2,2.6        c-8.3,0-23.4-7.8-24.9-12.9c-0.3-1.1,0.1-2,1.1-2.6C106.8,168.9,111.8,168,118.8,168 M118.8,167.8c-5.8,0-11.7,0.6-15,2.8        c-6.8,4.2,13.5,16,23.9,16c2.7,0,4.7-0.8,5.4-2.7c3.4-9.3,3.4-14.5,3.4-14.5S127.7,167.8,118.8,167.8L118.8,167.8z"></path>
              </g>
                                <g id="antebracos">
                                    <path fill="#D3B39B" d="M177.5,221.6c0,0,3.3,23.5,0,27.7s-14.5,0-16-5.8c-1.5-5.8-1.5-5.8-1.5-5.8s-0.2-6.8,2.9-9.2        c3.1-2.4,3.4-2.7,3.4-2.7L177.5,221.6z"></path>
                                    <path fill="#D3B39B" d="M62.5,221.6c0,0-3.3,23.5,0,27.7c3.3,4.2,14.5,0,16-5.8c1.5-5.8,1.5-5.8,1.5-5.8s0.2-6.8-2.9-9.2        c-3.1-2.4-3.4-2.7-3.4-2.7L62.5,221.6z"></path>
                                </g>
                                <g id="sombras" opacity="0.20">
                                    <path fill="#0A0A0A" d="M1.5,406.1c0-1.2,1.9-1.8,5.4-2.8c6.2-1.8,17.3-4,32-5.3c22.5-2,53.4-2,87.4-3.3c19.6-0.7,41.2,1,58.8,1.9        c39.1,1.9,65.9,5.2,65.9,9.6c0,4.4-26.9,8.2-66.4,10.1c-7.3,0.4-16.1-0.5-24.2-0.3c-11.1,0.3-21.9,1.6-34.1,1.6        c-4.2,0-8.4,0-12.6-0.1c-9.2-0.1-18.1-0.3-26.6-0.5C37.3,415.4,1.5,411.1,1.5,406.1z"></path>
                                </g>
                                <g id="cabeca">
                                    <g id="pescoco">
                                        <rect x="105.5" y="147.5" fill="#E1BFA3" width="27" height="47"></rect>
                                    </g>
                                    <path opacity="0.1" d="M104.4,172.5c-0.1,4.6,25.5,9.1,29.6-0.5c0,0-1,6.9-2.8,8.3c-1.8,1.3-12,8.5-12,8.5s-12.8-2.9-14.1-7.2        C103.8,177.3,104.4,172.5,104.4,172.5z"></path>
                                    <g id="orelhas">
                                        <g>
                                            <g>
                                                <path fill="#E1BFA3" d="M178.5,113.7L178.5,113.7c0-5.3-4-9.2-8.6-9.2h-11.5l-6.2,18.6c0,0.2,9.4,0.4,9.5,0.4h8.2              C174.5,123.5,178.5,118.9,178.5,113.7z"></path>
                                            </g>
                                            <g opacity="6.000000e-002">
                                                <path d="M166,108.8c0,0,1-0.5,2.6-0.5c0.8,0,1.9,0.1,2.9,0.8c0.5,0.3,1,0.8,1.3,1.4c0.1,0.3,0.3,0.6,0.3,0.9              c0.1,0.2,0.1,0.5,0.2,0.8c0.2,1.1,0.2,2.2-0.1,3.3c-0.1,0.5-0.3,1-0.6,1.5c-0.2,0.5-0.6,0.8-0.9,1.1c-0.7,0.6-1.5,0.7-2,0.6              c-0.5,0-0.7-0.1-0.7-0.1c0,0,1.2-0.2,1.9-1.3c0.7-1.1,0.8-3,0.5-4.8c0-0.2-0.1-0.5-0.1-0.7c0-0.2-0.1-0.4-0.2-0.5              c-0.2-0.3-0.3-0.6-0.6-0.9c-0.5-0.5-1.3-0.8-2-1.1C167.1,108.9,166,108.8,166,108.8z"></path>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path fill="#E1BFA3" d="M58.5,113.7L58.5,113.7c0-5.3,4-9.2,8.7-9.2h11.5l6.2,18.6c0,0.2-9.4,0.4-9.5,0.4h-8.2              C62.5,123.5,58.5,118.9,58.5,113.7z"></path>
                                            </g>
                                            <g opacity="8.000000e-002">
                                                <path d="M70.3,108.8c0,0-1.1,0.2-2.5,0.6c-0.7,0.2-1.5,0.6-2,1.1c-0.3,0.2-0.4,0.6-0.6,0.9c0,0.2-0.1,0.3-0.2,0.5              c0,0.3-0.1,0.5-0.1,0.7c-0.3,1.8-0.2,3.8,0.5,4.8c0.7,1.1,2,1.2,1.9,1.3c0,0-0.2,0.1-0.7,0.1c-0.5,0-1.3-0.1-2-0.6              c-0.4-0.3-0.7-0.7-0.9-1.1c-0.3-0.4-0.5-0.9-0.6-1.5c-0.3-1.1-0.2-2.2-0.1-3.3c0-0.3,0.1-0.5,0.2-0.8c0.1-0.3,0.2-0.6,0.3-0.9              c0.3-0.6,0.8-1.1,1.3-1.4c1-0.7,2-0.8,2.9-0.8C69.3,108.3,70.3,108.8,70.3,108.8z"></path>
                                            </g>
                                        </g>
                                    </g>
                                    <g opacity="0.1">
                                        <path d="M104.6,156.7l27.9,1.1v2.2c0,0-20,6-27,3.4v-5.6L104.6,156.7z"></path>
                                    </g>
                                    <g id="queixo">
                                        <path fill="#E1BFA3" d="M73.8,115.3c0-24.9,20.2,6.3,45.1,6.3s45.1-31.2,45.1-6.3s-20.2,45.1-45.1,45.1S73.8,140.2,73.8,115.3z"></path>
                                    </g>
                                    <g id="face">
                                        <path fill="#E1BFA3" d="M163.5,108.9c0,15.3-12.4,27.6-27.6,27.6h-33.7c-15.3,0-27.6-12.4-27.6-27.6V75.1          c0-15.3,12.4-27.6,27.6-27.6h33.7c15.3,0,27.6,12.4,27.6,27.6V108.9z"></path>
                                    </g>
                                    <g id="sombratesta" opacity="0.1">
                                        <path d="M151.8,66.7c0,0-35.1,17.4-63.8,2.1c0,0-10.7,12.6-11.3,13.1C76,82.4,73.1,83,73.1,83l-2.1-8.8l9.1-11.3l4-1.1l41.2,3.2          l26.3,0.2L151.8,66.7z"></path>
                                    </g>
                                    <g id="boca">
                                        <path fill="#CE9A74" d="M127.2,131.5c0,0,0.7,0.6,0.8,2.1c0,0.7-0.1,1.5-0.6,2.3c-0.2,0.4-0.5,0.8-0.9,1.1          c-0.4,0.3-0.8,0.5-1.3,0.8c-0.3,0.1-0.9,0.3-1.4,0.3c-0.5,0-1-0.1-1.4-0.2c-0.9-0.3-1.6-0.8-2-1.3c-0.9-1.1-0.7-2.1-0.8-2.1          c0,0,0.1,0.2,0.4,0.4c0.2,0.3,0.6,0.6,1.1,0.8c0.5,0.3,1,0.4,1.6,0.5c0.3,0,0.6,0,0.9,0c0.3,0,0.5-0.1,0.9-0.2          c0.2-0.1,0.5-0.2,0.8-0.4c0.2-0.2,0.5-0.4,0.7-0.6c0.4-0.4,0.7-1,0.9-1.5c0.2-0.5,0.3-1,0.3-1.3          C127.2,131.8,127.2,131.5,127.2,131.5z"></path>
                                    </g>
                                    <g id="cabelo">
                                        <g id="lados">
                                            <g>
                                                <path fill="#6B5947" d="M84.4,67c0,0-5.9,10-9,13.8c0,0,3.9,26.7-1.7,32.6c0,0-0.8-2.4-2.6-5.4c-1.8-3.1-6.5-37.2-4.7-42.3              s6.1-13.8,12-12.8C84.4,54,84.4,67,84.4,67z"></path>
                                            </g>
                                            <g>
                                                <path fill="#6B5947" d="M164,114.4l0.1,0.1c0,0,6.8-27.6,6-36.6s-3.3-18.7-5.1-21.7c-1.8-3.1-10.7-5.6-12-2.8              c-1.3,2.8-6.1,9-6.1,9s12.5,12,13,14.8c0.4,2.1,0.5,15.3-0.1,24.2C159.4,106.2,160.9,110.9,164,114.4z"></path>
                                            </g>
                                            <g>
                                                <path fill="#3D332D" d="M84.2,65.4c0,0-5.6,11.5-9.6,14c0,0,7.8-12.3,8-14c0.2-1.8,0.2-1.8,0.2-1.8L84.2,65.4z"></path>
                                            </g>
                                            <g>
                                                <path fill="#3D332D" d="M73.8,113.5c0,0-3.2-13.9-3.2-15.6c0-1.8,0.2-4.9,0.2-4.9s-1.8,8.3,0,14.2L73.8,113.5z"></path>
                                            </g>
                                            <g>
                                                <path fill="#3D332D" d="M162,94.8c0,0-0.2,11,1.4,14.5l0.5-2.7L162,94.8z"></path>
                                            </g>
                                        </g>
                                        <g id="franja">
                                            <g>
                                                <path fill="#6B5947" d="M72.9,59.6c0,0,33.5,22.5,72.7,7.7c0,0,17.4-1.8,22.3-11.8c0,0-6.1,1-7.2,1c-1,0,4.6-6.7,4.9-16.9              c0.3-10.2-3.3-13.6-3.3-13.6s-5.9,10-10.5,11c0,0,2.6-8.7,2.3-13.3s0-6.1,0-6.1s-8.2,12-36.8,13.8c-28.7,1.8-39.1,3.1-43.2,7.7              c-4.1,4.6-4.1,12.8-3.3,15.6S72.9,59.6,72.9,59.6z"></path>
                                            </g>
                                            <g>
                                                <path fill="#3D332D" d="M73.6,55.9c0.2-1.2-2.6-8.1,1.2-11.7c3.8-3.6,15.3-6.9,23.5-7.2c8.1-0.2,29.2-1.7,34.2-3.4              c5-1.7,7.4-3.8,7.4-3.8s-2.6,6.9-37.8,10.3C66.9,43.4,73.6,55.9,73.6,55.9z"></path>
                                            </g>
                                            <g>
                                                <path fill="#3D332D" d="M154.7,37.7c0,0-8,7-26,9.3c-18,2.2-24.6,4.9-24.6,4.9s32.5-3.5,34.6-3.7              C140.8,48.1,151.6,47.9,154.7,37.7z"></path>
                                            </g>
                                            <g>
                                                <path fill="#3D332D" d="M83.7,57.8c0,0,12,2.9,15.3,2.6c3.4-0.2,9.1-2.2,9.1-2.2S103.1,65.9,83.7,57.8z"></path>
                                            </g>
                                            <g>
                                                <path fill="#3D332D" d="M154,17.6c0,0-5.2,12.9-6.7,14.1c-1.4,1.2-4.5,3.8-4.5,3.8s7.7-2.9,9.8-9.1L154,17.6z"></path>
                                            </g>
                                            <g>
                                                <path fill="#3D332D" d="M150.7,66.4c0,0,15.1-5.8,17.1-10.9c0,0-19.7,11-22.3,11.8L150.7,66.4z"></path>
                                            </g>
                                        </g>
                                    </g>
                                    <g id="sobrancelhas">
                                        <g>
                                            <path fill="#3D332D" d="M84.6,92c0,0,16.8-9.6,14.2-12.2C96.2,77.2,84.6,92,84.6,92z"></path>
                                        </g>
                                        <g>
                                            <path fill="#3D332D" d="M151.5,91.5c0,0-16.8-9.6-14.2-12.2C139.9,76.8,151.5,91.5,151.5,91.5z"></path>
                                        </g>
                                    </g>
                                    <g id="nariz">
                                        <path fill="#917B6A" d="M115.1,86.2c0,0-0.1,0.8-0.3,2.2c-0.2,1.4-0.5,3.4-0.8,5.8c-0.4,2.4-0.7,5.2-1.2,8.1c-0.5,3-1,6.1-1.5,9.3          c-0.5,3.2-1,6.3-1.4,9.3c-0.1,0.7-0.2,1.5-0.3,2.2c-0.1,0.7-0.1,1.5-0.1,1.9c0.1,0.4,0.6,0.8,1.1,1.2c0.5,0.3,1.1,0.6,1.6,0.8          c2.2,0.8,4.2,1.3,5.5,1.6c1.4,0.3,2.2,0.5,2.2,0.5s-0.8,0-2.2-0.2c-1.4-0.2-3.4-0.3-5.8-1.1c-0.6-0.2-1.2-0.4-1.8-0.7          c-0.6-0.3-1.3-0.7-1.7-1.7c-0.2-1-0.1-1.6,0-2.4c0.1-0.7,0.1-1.5,0.2-2.2c0.4-3,0.8-6.2,1.3-9.4c0.6-3.2,1.1-6.3,1.6-9.3          c0.6-3,1.2-5.7,1.6-8.1c0.5-2.4,1-4.3,1.3-5.7C114.9,87,115.1,86.2,115.1,86.2z"></path>
                                    </g>
                                    <g id="olhos">
                                        <circle fill="#3D332D" cx="98.4" cy="114" r="2.4"></circle>
                                        <circle fill="#3D332D" cx="136.9" cy="114" r="2.4"></circle>
                                    </g>
                                </g>
                                <g id="camisas">
                                    <path fill="#515151" d="M137.9,174.8c0,0,35.4,13.8,38.3,40.9l-11,11.5c0,0-0.5,67.7,1.9,71.6c0,0-20.1,12.2-33.3,15.1        s-40-2.2-43.1-3.6c-3.1-1.4-15.3-10.8-15.3-10.8s2.6-9.8,2.4-13.9c-0.2-4.1,0.5-27.5,0.2-31.8c-0.2-4.3-1.2-19.9-1.2-19.9        l-15.3-14.4c0,0,7.6-41.2,38.7-42.3c0,0,13,15.5,15.6,15.5s3.1,6.2,3.1,6.2s3.1-6.3,11-15.2C137.9,174.8,137.9,174.8,137.9,174.8z"></path>
                                    <g>
                                        <polygon fill="#353535" points="62.8,220.6 60.2,224.5 77,238.6 77.8,236.8 77.2,233.2 		"></polygon>
                                    </g>
                                    <g>
                                        <polygon fill="#353535" points="165.1,227.1 175.5,216.3 179.3,223.2 165.1,235.8 		"></polygon>
                                    </g>
                                    <g id="gola">
                                        <g>
                                            <path fill="#515151" d="M109,189.8l-0.2-8.2l7.7,0.8l1.9,1.4c0,0,2.3,4.6,2.1,8.8c-0.2,4.1-4.6,5-4.6,5L109,189.8z"></path>
                                        </g>
                                        <g>
                                            <path fill="#515151" d="M121.8,182c0,0-5.4,15.2-5.6,23.3l0.5,6.4l8.9,0.2l-1-8.8c0,0,6.7-11,7.7-12            C133.3,190.2,130.1,179.5,121.8,182z"></path>
                                        </g>
                                        <g>
                                            <g>
                                                <g>
                                                    <path fill="#515151" d="M109.7,196.7c-4.3-4.1-12.4-18.1-12.5-18.2c0.4-2.1,5.6-7,6.5-7.7c0,0,0,0.1,0.1,0.2                c0.5,0.8,2.8,2.8,3.5,3c0.7,0.1,10.6,6.3,11.4,7.1c0.6,0.6,0.8,4.1,0.9,6c-0.3-0.8-1-2.1-1.2-2.8c-0.2-0.5-0.7-0.8-1.6-0.8                c-1,0-2.5,0.3-4.5,1c-2.8,1-2.7,7.5-2.7,10.7C109.7,195.8,109.7,196.4,109.7,196.7z"></path>
                                                    <path fill="#2D2D2D" d="M103.6,170.9C103.7,170.9,103.7,170.9,103.6,170.9c0.5,0.9,2.8,2.9,3.6,3.1c0.7,0.1,10.6,6.3,11.4,7.1                c0.4,0.4,0.7,3.1,0.8,5.3c-0.3-0.7-0.7-1.7-0.9-2.2c-0.2-0.6-0.8-0.9-1.7-0.9c-1,0-2.6,0.3-4.5,1c-2.9,1-2.8,7.4-2.8,10.8                c0,0.4,0,0.9,0,1.2c-4.1-4.1-11.5-16.7-12.2-17.9C97.9,176.4,102.5,171.8,103.6,170.9 M103.8,170.5c-0.3,0-6.2,5.7-6.7,8                c0,0,8.3,14.4,12.6,18.3c0,0,0,0,0,0c0.4,0-0.9-11,2.7-12.3c2-0.7,3.4-1,4.4-1c0.9,0,1.3,0.2,1.5,0.7c0.3,1,1.4,3.4,1.4,3.4                s-0.2-5.9-1-6.7c-0.8-0.8-10.7-7-11.5-7.2C106.5,173.6,103.6,171,103.8,170.5C103.8,170.5,103.8,170.5,103.8,170.5L103.8,170.5                z"></path>
                                                </g>
                                            </g>
                                        </g>
                                        <g>
                                            <path fill="#353535" d="M129.5,191.6c0,0-5.2-4.5-6.8-4.2c-1.6,0.3-4.2,5.5-4.5,6.2c-0.2,0.7-1,18.7-0.4,20.6l-0.7-0.1            c0,0,0.6-20.3,0.6-21c0.1-0.7,2-5.5,2-5.5l2.1-5.6C121.8,182,129.1,177.8,129.5,191.6z"></path>
                                        </g>
                                        <g>
                                            <circle fill="#BCBCBC" cx="121.6" cy="194.2" r="2.2"></circle>
                                        </g>
                                        <g>
                                            <circle fill="#BCBCBC" cx="121.7" cy="202.3" r="2"></circle>
                                        </g>
                                        <g>
                                            <g>
                                                <g>
                                                    <path fill="#515151" d="M129.7,199.1c0.2-2.4,0.7-12.4-2.8-16.2c-0.9-0.9-1.9-1.4-3.1-1.4c-0.4,0-0.8,0.1-1.2,0.2                c2.5-1.7,11.3-8,12.6-10.6l1.4-1.7c0.5,0.2,3.5,1.6,7.3,8.3L129.7,199.1z"></path>
                                                    <path fill="#2D2D2D" d="M136.6,169.6c0.7,0.3,3.5,1.9,7.1,8.1l-13.9,20.9c0.2-3,0.4-12.2-2.8-15.8c-0.9-1-2-1.5-3.2-1.5                c-0.2,0-0.5,0-0.7,0c3-2.1,10.8-7.8,12.2-10.3L136.6,169.6 M136.5,169.3l-1.4,1.8c-1.6,3-13.2,11-13.2,11                c0.7-0.2,1.4-0.4,1.9-0.4c7.4,0,5.7,17.9,5.7,17.9l14.5-21.9C139.7,170.2,136.5,169.3,136.5,169.3L136.5,169.3z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                    <g opacity="0.14">
                                        <path d="M78.9,288c0,0-0.7,5.3-1.4,6.9c-0.7,1.7,24.4,11.5,24.4,11.5L78.9,288z"></path>
                                    </g>
                                </g>
                                <g>
                                    <path fill="#E6B99B" d="M43.6,262"></path>
                                </g>
                                <path fill="#D3B39B" d="M66.2,245.2c0,0,6.5-6.7,15.8,1c9.2,7.7,2.2,12-4.1,12.7c-6.3,0.7-6.3,0.7-6.3,0.7s-4.2-0.9-7.3-2.2      c-1.9-0.8-3.1-2.7-3.1-4.7l0.1-7L66.2,245.2z"></path>
                                <path fill="#E1BFA3" d="M173.3,245.2c0,0-6.5-6.7-15.8,1c-9.2,7.7-2.2,12,4.1,12.7c6.3,0.7,6.3,0.7,6.3,0.7s3.6-1,6.5-2.2      c2.3-0.9,3.8-3.1,3.8-5.6l0-5.5L173.3,245.2z"></path>
                                <g id="maos">
                                    <path id="esquerda" fill="#E1BFA3" d="M172.1,262.9c0,0,8.2-4,5.2-10.6s-15.5-14.6-18-13.8c-2.5,0.8-16.7,14-16.5,15.4        s4.6,0.8,5.6,0.4c1-0.4-0.2,0,4.4,3C157.3,260.3,168.1,264.4,172.1,262.9z"></path>
                                    <path id="direita" fill="#E1BFA3" d="M66.3,251.3c0,0,10.5-9,13-10.2c2.5-1.2,10.6-1.8,12.8-4.6c2.3-2.8,1.7,4-2.5,7        c0,0,8.3,10.5,8.9,13.2c0.7,2.7-4.4,0-4.4,0s-12.3,5.4-13.5,4.8c-1.2-0.6-3,0-3,0s-3.7,1-6-3c-2.3-4-2.3-4-2.3-4L66.3,251.3z"></path>
                                </g>
                                <g id="pernas">
                                    <g>
                                        <path fill="#212121" d="M15.7,303.3c0,0-1.9-11.2,8-15c9.9-3.8,37,3.2,64.8,18.5c27.8,15.3,69.9-5.1,98-14.7          c28.1-9.6,45.9-10.1,49.3,0.9c0,0-24.7,39.3-45.5,40.6s-48.2-1-48.2-1l-31.9,0.6c0,0-24.3,8.6-28.7,8.3          C77,341.2,20.8,325.3,15.7,303.3z"></path>
                                    </g>
                                    <g>
                                        <path fill="#2B2B2B" d="M91.2,333.1c0,0,20.3-12,21.9-11.5c1.6,0.5,6.9,5.9,9.1,6.9c2.2,1,1.6,3.7,1.6,3.7l-3,9.3l-22.3-1.9          L91.2,333.1z"></path>
                                    </g>
                                    <g>
                                        <polygon fill="#E1BFA3" points="134.9,341.1 114.3,342 119.9,331 137.6,330.6 136.7,342.2 		"></polygon>
                                    </g>
                                    <g>
                                        <polygon fill="#EAEAEA" points="119,329.9 127.3,330.7 126,342.5 115.4,340.3 		"></polygon>
                                    </g>
                                    <g id="notebook">
                                        <g>
                                            <g>
                                                <path fill="#898989" d="M212.5,295.1c0,1.9-1.5,3.4-3.4,3.4H33.9c-1.9,0-3.4-1.5-3.4-3.4v-1.3c0-1.9,1.5-3.4,3.4-3.4h175.3              c1.9,0,3.4,1.5,3.4,3.4V295.1z"></path>
                                            </g>
                                            <g>
                                                <path fill="#C1C2C7" d="M212.5,289.7c0,3.8-3,6.8-6.8,6.8H37.3c-3.8,0-6.8-3-6.8-6.8V186.3c0-3.8,3-6.8,6.8-6.8h168.4              c3.8,0,6.8,3,6.8,6.8V289.7z"></path>
                                            </g>
                                        </g>
                                        <g id="macae">
                                            <path fill="#FFFFFF" d="M125.4,228.3c0.9-1.1,1.6-2.7,1.4-4.3c-1.4,0.1-3,0.9-4,2.1c-0.9,1-1.6,2.6-1.4,4.2            C122.9,230.3,124.5,229.5,125.4,228.3"></path>
                                            <path fill="#FFFFFF" d="M128.8,238.4c0-3.4,2.8-5.1,2.9-5.2c-1.6-2.3-4.1-2.6-4.9-2.7c-2.1-0.2-4.1,1.2-5.2,1.2            c-1.1,0-2.7-1.2-4.5-1.2c-2.3,0-4.4,1.3-5.6,3.4c-2.4,4.1-0.6,10.3,1.7,13.6c1.1,1.6,2.5,3.5,4.3,3.4c1.7-0.1,2.4-1.1,4.4-1.1            c2.1,0,2.7,1.1,4.5,1.1c1.8,0,3-1.7,4.1-3.3c1.3-1.9,1.8-3.8,1.9-3.9C132.4,243.8,128.9,242.5,128.8,238.4"></path>
                                        </g>
                                        <radialgradient id="luzmacae_1_" cx="121.6441" cy="239.6875" r="17.2316" gradientunits="userSpaceOnUse">
                                            <stop offset="0" style="stop-color:#FFFFFF;"></stop>
                                            <stop offset="0.9458" style="stop-color:#FFFFFF;stop-opacity:0;"></stop>
                                        </radialgradient>
                                        <path id="luzmacae" opacity="0.66" fill="url(#luzmacae_1_)" d="M138.7,239.7c0,2.9-0.7,5.7-2,8.1c-2.9,5.4-8.6,9.1-15.2,9.1          c-9.5,0-17.2-7.7-17.2-17.2s7.7-17.2,17.2-17.2c7.3,0,13.5,4.5,16,10.9c0.7,1.7,1.1,3.5,1.2,5.4l0.2,0.3l0,0.3L138.7,239.7z"></path>
                                    </g>
                                    <g opacity="0.1">
                                        <polygon points="135.8,341 132.4,341.2 134.8,330.6 136,330.5 		"></polygon>
                                    </g>
                                    <g>
                                        <path fill="#333333" d="M135.7,326.9l-1,27.8c0,0,55.2-2.9,87.4-33.8s2.2-37,2.2-37s-10.2-0.6-10.2,1.3          C214.2,287,191.9,319.9,135.7,326.9z"></path>
                                    </g>
                                    <g>
                                        <path fill="#E1BFA3" d="M129.3,349.5c0,0,24.9-2.1,25.4-1.6c0.5,0.5,3.8,8.9,3.8,8.9l-34,1.4c0,0,1.1-5.3,1.8-6.5          C126.9,350.5,129.3,349.5,129.3,349.5z"></path>
                                    </g>
                                    <g>
                                        <path fill="#333333" d="M130.9,361c0.9-0.2-1.6-23.3-1.6-23.3s-68.3-5.1-98.3-45.6h0c-1.5-2.9-6.7-5.8-9.3-3.9l-2.3,1          c-8.7,6.3-7.5,19.3-1.7,28.4c3.1,4.8,7.6,10.1,14.3,15.3C53.4,349.5,88.8,368.7,130.9,361z"></path>
                                    </g>
                                    <g opacity="0.1">
                                        <polygon points="150.4,357.3 145.7,357.4 146.8,348 149.4,351.4 		"></polygon>
                                    </g>
                                    <g>
                                        <polygon fill="#EAEAEA" points="157.2,358.6 149.4,357.8 146.4,347.8 155.8,347.3 		"></polygon>
                                    </g>
                                    <g id="pe">
                                        <g>
                                            <path fill="#2B2B2B" d="M150.9,347c-0.7-0.5,12.3-10.4,13.4-10.2c1.1,0.2,11.6,9.4,12.8,9.4c1.1,0,27.8,8.5,25.2,16.4l-25.5-0.6            l-19.9-1.1C156.8,360.9,155.3,350.7,150.9,347z"></path>
                                        </g>
                                        <g>
                                            <rect x="161.9" y="353.5" transform="matrix(0.9869 0.1612 -0.1612 0.9869 59.7596 -21.5769)" fill="#777070" width="1.9" height="7.9"></rect>
                                        </g>
                                        <g>
                                            <rect x="165.3" y="353.9" transform="matrix(0.9821 0.1884 -0.1884 0.9821 70.3837 -24.9184)" fill="#777070" width="1.9" height="7.6"></rect>
                                        </g>
                                        <g>
                                            <rect x="168.4" y="354.8" transform="matrix(0.9989 4.593970e-002 -4.593970e-002 0.9989 16.6397 -7.4027)" fill="#777070" width="1.9" height="7"></rect>
                                        </g>
                                        <g>
                                            <rect x="171.7" y="355.6" transform="matrix(0.9914 0.1308 -0.1308 0.9914 48.3763 -19.4954)" fill="#777070" width="1.9" height="6.1"></rect>
                                        </g>
                                    </g>
                                    <g>
                                        <path fill="#E6B99B" d="M133,342.9"></path>
                                    </g>
                                </g>
            </svg>
                            <div class="aviso">Some browsers are not compatible.</div>
                        </div>
                    </div>
                </div>
                <div class="el-icon-thank">
                    <img src="https://www.freeiconspng.com/uploads/like-icons-png-7.png" alt="">
                </div>
                <div class="el-main-title">
                    Заявка успешно создана!
                </div>
                <div class="el-subtitle">Благодарим <b><?php echo $_POST['name']?></b> за заявку. В течении дня мы свяжемся с по номеру <b><?php echo $_POST['phone']?></b>! Ожидайте звонка, будьте на связи. </div>
                <div class="el-row-btn">
                    <a href="https://gribydoma.com">Вернуться на сайт</a>
                </div>
            </div>
        </div>
        <?php if(!empty($products)){ ?>
        <div class="el-relation-column">
            <div class="el-content">
                <?php foreach($products as $product){ ?>
                <div class="el-item-product">
                    <span class="sale">-<?=$product['sale']?>%</span>
                    <div class="el-thumb">
                        <img src="<?=$product['image']?>" alt="<?=$product['name']?>">
                    </div>
                    <div class="el-product-inf">
                        <div class="el-prod-title"><a href="<?=$product['link'] . '?utm_term=from_' . $siteID . '&utm_source=relation_author_' . $webmasterID?>"><?=$product['name']?></a></div>
                        <div class="el-delay-sale">Акция действует до <?php $time = date('j F Y') ; echo date('j',strtotime($time . "+1 days"));?> числа.</div>
                        <div class="el-prod-descr"><?=$product['description']?></div>
                        <div class="el-row-btn">
                            <a href="<?=$product['link'] . '?utm_term=from_' . $siteID . '&utm_source=relation_author_' . $webmasterID?>">Смотреть</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800');
    *{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }
    body{
        background: #c74242b8;
    }
    .el-icon-thank{
        display: none;
    }
    .el-item-product .el-product-inf{
        float: left;
        width: 100%;
        color: #333;
        padding-top: 15px;
    }
    .el-item-product:nth-child(1) .el-product-inf{
        width: calc(100% - 240px);
        padding-left: 20px;
        padding-top: 30px;
    }
    .el-item-product .el-product-inf .el-prod-title a,
    .el-item-product .el-product-inf .el-prod-title{
         font-weight: 700;
        font-size: 20px;
        color: #333;
        max-height: 57px;
        overflow: hidden;
        text-decoration: none;
        font-family: 'Open Sans', sans-serif;
    }
    .el-item-product:nth-child(1) .el-prod-title a,
    .el-item-product:nth-child(1) .el-product-inf .el-prod-title{
        font-size: 22px;
    }
    .el-item-product:nth-child(1) .el-product-inf .el-prod-descr{
        padding-right: 30px;
    }
    .el-item-product .el-product-inf .el-prod-descr{
        color: #4f4f4f;
        font-size: 15px;
        line-height: 21px;
        font-family: 'Open Sans', sans-serif;
        max-height: 125px;
        overflow: hidden;
    }
    .el-item-product .el-product-inf  .el-row-btn a{
        display: inline-block;
        text-decoration: none;
        padding: 12px 30px;
        font-family: 'Open Sans', sans-serif;
        font-size: 12px;
        transition: 0.3s;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #fff;
        background: #444;
        opacity: 1;
        box-shadow: 5px 5px 0 #13131347;
    }
    .el-item-product .el-product-inf  .el-delay-sale{
        font-family: 'Open Sans', sans-serif;
        font-size: 13px;
        color: #d67676;
        margin: 15px 0;
        font-weight: 600;
    }

    .el-inner-content{
        text-align: center;
        color: #fff;
        margin: 0 auto;

    }
    .sale {
        position: absolute;
        display: inline-block;
        background: orange;
        color: white;
        height: 2.5rem;
        width: 2.5rem;
        text-align: center;
        vertical-align: middle;
        line-height: 2.5rem;
        margin: 0;
        -webkit-transform: rotate(-20deg);
        transform: rotate(-20deg);
        -webkit-animation: beat 1s ease infinite alternate;
        animation: beat 1s ease infinite alternate;
    }
    .sale:before, .sale:after {
        content: "";
        position: absolute;
        background: inherit;
        height: inherit;
        width: inherit;
        top: 0;
        left: 0;
        z-index: -1;
        -webkit-transform: rotate(30deg);
        transform: rotate(30deg);
    }
    .sale:after {
        -webkit-transform: rotate(60deg);
        transform: rotate(60deg);
    }

    @-webkit-keyframes beat {
        from {
            -webkit-transform: rotate(-20deg) scale(1);
            transform: rotate(-20deg) scale(1);
        }
        to {
            -webkit-transform: rotate(-20deg) scale(1.1);
            transform: rotate(-20deg) scale(1.1);
        }
    }

    @keyframes beat {
        from {
            -webkit-transform: rotate(-20deg) scale(1);
            transform: rotate(-20deg) scale(1);
        }
        to {
            -webkit-transform: rotate(-20deg) scale(1.1);
            transform: rotate(-20deg) scale(1.1);
        }
    }

    .el-inner-content .el-content{
        width: 100%;
        max-width: 750px;
        padding:  0 15px;
    }

    .el-inner-content .el-thank-column{
        width: 50%;
        float: left;
        padding-top: 100px;

    }
    .el-inner-content .el-thank-column .el-content{
        float: right;
    }
    .el-inner-content .el-relation-column{
        background: #eaeaea;
        width: 50%;
        padding: 0 15px;
        float: left;
    }
    .el-inner-content .el-relation-column .el-content{
        float: left;
        min-height: 100vh;
        padding: 20px 0;
        text-align: left;
        display: flex;
        flex-flow: wrap row;
        justify-content: space-between;
        align-content: center;
        align-items: center;
    }
    .el-inner-content .el-relation-column .el-title{
        font-weight: 700;
        color: #333;
        font-family: 'Rubik', sans-serif;
        margin-bottom: 20px;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 21px;
    }
    .el-inner-content .el-relation-column  .el-item-product{
        padding: 15px;
        min-height: 180px;
        width: calc(50% - 15px);
        background: #fff;
        box-shadow: 15px 15px 0px #dfdfdf;
        margin-bottom:  30px;
        position: relative;
    }
    .el-inner-content .el-relation-column .el-item-product .el-thumb{
        width: 100%;
        height: 220px;
        padding: 15px;
        border: 1px solid #eaeaea;
        float: left;
    }
    .el-inner-content .el-relation-column .el-item-product .el-thumb img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .el-inner-content .el-relation-column .el-item-product:nth-child(1){
        width: 100%;
    }
    .el-inner-content .el-relation-column .el-item-product:first-child .el-thumb{
        width: 240px;
        height: 275px;
    }

    .el-inner-content.el-only-thank .el-thank-column .el-content,
    .el-inner-content.el-only-thank .el-thank-column{
        width: 100%;
        max-width: 100% ;
    }



    .el-inner-content .el-main-title{
        font-size: 28px;
        font-family: 'Playfair Display', serif;
        margin-bottom: 30px;
    }
    .el-subtitle{
        margin: 0 auto;
        width: 100%;
        max-width: 500px;
        font-family: 'Open Sans', sans-serif;
        line-height: 24px;
        font-size: 14px;
        margin-bottom: 25px;
        color: #eaeaea;
    }
    .el-subtitle b{
        color: #fff;
    }
    .el-row-btn {
        margin: 20px 0;
    }
    .el-row-btn a{
        display: inline-block;
        text-decoration: none;
        padding: 12px 30px;
        font-family: 'Open Sans', sans-serif;
        font-size: 12px;
        transition: 0.3s;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #333;
        background: #fff;
        opacity: 1;
        box-shadow: 2px 2px 15px #13131347;
    }
    .el-row-btn a:hover{
        opacity: 0.9;
        letter-spacing: 1px;
    }

    .a {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar {
        width: 200px;
        margin: 0 auto;
        transition:.2s;
    }
    #sobrancelhas {
        transform: translateY(-9px);
        animation: sobrancelhas 5s linear infinite;
    }

    @keyframes sobrancelhas {
        0% {
            transform: translateY(-10);
            -ms-transform: translateY(-10);
            -moz-transform: translateY(-10);
        }

        25% {
            transform: translateY(0px);
            -ms-transform: translateY(0px);
            -moz-transform: translateY(0px);
        }

        75% {
            transform: translateY(0px);
            -moz-transform: translateY(0px);
            -ms-transform: translateY(0px);
        }

        100% {
            transform: translateY(10);
            -moz-transform: translateY(10);
            -ms-transform: translateY(10);
        }
    }

    #nariz {
        transform: translateY(-9px);
        -ms-transform: translateY(-9px);
        -moz-transform: translateY(-9px);
        animation: nariz 5s linear infinite;
    }

    @keyframes nariz {
        0% {
            transform: translateY(-10);
            -ms-transform: translateY(-10);
            -moz-transform: translateY(-10);
        }

        25% {
            transform: translateY(0px);
            -ms-transform: translateY(0px);
            -moz-transform: translateY(0px);
        }

        75% {
            transform: translateY(0px);
            -moz-transform: translateY(0px);
            -ms-transform: translateY(0px);
        }

        100% {
            transform: translateY(10);
            -moz-transform: translateY(10);
            -ms-transform: translateY(10);
        }
    }

    #boca {
        transform: translateY(-5px);
        -ms-transform: translateY(-5px);
        -moz-transform: translateY(-5px);
        animation: boca 5s linear infinite;
    }

    @keyframes boca {
        0% {
            transform: translateY(-10);
            -ms-transform: translateY(-10);
            -moz-transform: translateY(-10);
        }

        25% {
            transform: translateY(0px);
            -ms-transform: translateY(0px);
            -moz-transform: translateY(0px);
        }

        75% {
            transform: translateY(0px);
            -moz-transform: translateY(0px);
            -ms-transform: translateY(0px);
        }

        100% {
            transform: translateY(10);
            -moz-transform: translateY(10);
            -ms-transform: translateY(10);
        }
    }

    #olhos {
        transform: translateX(-2px);
        -moz-transform: translateX(-2px);
        -ms-transform: translateX(-2px);
        animation: olhos 2s linear infinite;
    }

    @keyframes olhos {
        0% {
            transform: translateX(-2);
            -ms-transform: translateX(-2);
            -moz-transform: translateX(-2);
        }

        25% {
            transform: translateX(2px);
            -moz-transform: translateX(2px);
            -ms-transform: translateX(2px);
        }

        75% {
            transform: translateX(-2px);
            -ms-transform: translateX(-2px);
            -moz-transform: translateX(-2px);
        }

        100% {
            transform: translateX(2);
            -ms-transform: translateX(2);
            -moz-transform: translateX(2);
        }
    }

    #notebook {
        transform: translateY(-4px);
        -moz-transform: translateY(-4px);
        -ms-transform: translateY(-4px);
        animation: notebook 6s linear infinite;
    }

    @keyframes notebook {
        0% {
            transform: translateY(-4);
        }

        25% {
            transform: translateY(0px);
        }

        75% {
            transform: translateY(0px);
        }

        100% {
            transform: translateY(4);
        }
    }

    #pernas {
        transform: translateY(-9px);
        animation: pernas 6s infinite;
    }

    @keyframes pernas {
        0% {
            transform: translateY(-10);
            -ms-transform: translateY(-10);
            -moz-transform: translateY(-10);
        }

        25% {
            transform: translateY(0px);
            -ms-transform: translateY(0px);
            -moz-transform: translateY(0px);
        }

        75% {
            transform: translateY(0px);
            -moz-transform: translateY(0px);
            -ms-transform: translateY(0px);
        }

        100% {
            transform: translateY(10);
            -moz-transform: translateY(10);
            -ms-transform: translateY(10);
        }
    }

    #pe {
        animation: pe 6s infinite;
    }

    @keyframes pe {
        0% {
            transform: rotateX(2deg);
            -ms-transform: rotateX(2deg);
            -moz-transform: rotateX(2deg);
        }

        25% {
        }

        75% {
        }

        100% {
        }
    }

    #camisas {
        transform: translateY(-9px);
        -ms-transform: translateY(-9px);
        -moz-transform: translateY(-9px);
        animation: camisas 6s infinite;
    }

    @keyframes camisas {
        0% {
            transform: translateY(-10);
            -ms-transform: translateY(-10);
            -moz-transform: translateY(-10);
        }

        25% {
            transform: translateY(0px);
            -ms-transform: translateY(0px);
            -moz-transform: translateY(0px);
        }

        75% {
            transform: translateY(0px);
            -moz-transform: translateY(0px);
            -ms-transform: translateY(0px);
        }

        100% {
            transform: translateY(10);
            -moz-transform: translateY(10);
            -ms-transform: translateY(10);
        }
    }

    #camisacostas {
        transform: translateY(-9px);
        -ms-transform: translateY(-9px);
        -moz-transform: translateY(-9px);
        animation: camisacostas 6s infinite;
    }

    @keyframes camisacostas {
        0% {
            transform: translateY(-10);
            -ms-transform: translateY(-10);
            -moz-transform: translateY(-10);
        }

        25% {
            transform: translateY(0px);
            -ms-transform: translateY(0px);
            -moz-transform: translateY(0px);
        }

        75% {
            transform: translateY(0px);
            -moz-transform: translateY(0px);
            -ms-transform: translateY(0px);
        }

        100% {
            transform: translateY(10);
            -moz-transform: translateY(10);
            -ms-transform: translateY(10);
        }
    }

    #cabeca {
        transform: translateY(-9px);
        -ms-transform: translateY(-9px);
        -moz-transform: translateY(-9px);
        animation: cabeca 6s infinite;
    }

    @keyframes cabeca {
        0% {
            transform: translateY(-8);
        }

        25% {
            transform: translateY(0px);
        }

        75% {
            transform: translateY(0px);
        }

        100% {
            transform: translateY(8);
        }
    }

    #macae {
        opacity: 1;
        animation: macae 2s linear;
    }

    @keyframes macae {
        0% {
            opacity: 0.2;
        }

        25% {
        }

        75% {
        }

        100% {
        }
    }

    #luzmacae {
        animation: luzmacae 5s;
    }

    @keyframes luzmacae {
        0% {
            opacity: 0.2;
        }

        25% {
            opacity: 1;
        }

        75% {
            opacity: 1;
        }

        100% {
            opacity: 0.2;
        }
    }

    #orelhas {
        animation: orelhas 6s linear infinite;
    }

    @keyframes orelhas {
        0% {
            transform: translateY(-10);
            -ms-transform: translateY(-10);
            -moz-transform: translateY(-10);
        }

        25% {
            transform: translateY(0px);
            -ms-transform: translateY(0px);
            -moz-transform: translateY(0px);
        }

        75% {
            transform: translateY(0px);
            -moz-transform: translateY(0px);
            -ms-transform: translateY(0px);
        }

        100% {
            transform: translateY(10);
            -moz-transform: translateY(10);
            -ms-transform: translateY(10);
        }
    }

    #sombras {
        animation: sombras 6.1s linear infinite;
    }

    @keyframes sombras {
        0% {
            transform: scale(0.96);
        }

        25% {
            transform: scale(1);
        }

        75% {
            transform: scale(1);
        }

        100% {
            transform: scale(0.96);
        }
    }

    .aviso {
        background: #fff;
        color: #169fd4;
        text-align: center;
        padding: 2px;
        position: fixed;
        right: 0px;
        bottom: 0px;
        font-size: 9px;
    }

    @media(max-width: 1200px){
        .el-inner-content .el-thank-column,
        .el-inner-content .el-relation-column{
            width: 100%;
        }
        .el-inner-content .el-content{
            width: 100%;
            max-width: 100% ;
            padding-bottom: 50px;
        }
    }
    @media(max-width: 998px){
        body{
            padding-top: 70px;
            background: #42c752b8;
        }
        .el-inner-content .el-main-title{
            font-size: 22px;
        }
        .el-subtitle{
            font-size: 15px;
            color: #fff;
        }
        .el-row-btn a{
            font-size: 12px;
        }

    }

    @media(max-width: 768px){
        body{
            padding-top: 0;
            background: #eaeaea;
        }
        .el-subtitle{
            font-size: 13px;
            color: #a9a9a9;
        }
        .el-inner-content .el-thank-column{
            background: #414141;
            position: relative;
        }

        .el-inner-content .el-main-title{
            font-size: 22px;
            color: #fff;
        }
        .el-inner-content .el-relation-column{
            margin-top: -35px;
        }
        .el-icon-thank{
            width: auto;
            display: block;
            padding: 15px 0;
            text-align: center;
        }
        .el-icon-thank img{
            width: 80px;
            height: 80px;
            display: inline-block;
        }
        .avatar{
            display: none;
        }
        .el-inner-content .el-thank-column{
            padding-top: 0;
        }
        .el-inner-content .el-relation-column .el-content{
            justify-content: center;
        }
        .el-inner-content .el-relation-column .el-item-product{
            width: 100%;
            max-width: 380px;
        }
        .el-item-product:nth-child(1) .el-product-inf,
        .el-inner-content .el-relation-column .el-item-product:first-child .el-thumb{
            width: 100%;
        }
        .el-item-product:nth-child(1) .el-product-inf{
            padding-left: 0;
            padding-right: 0;
        }
    }

</style>
</body>
</html>