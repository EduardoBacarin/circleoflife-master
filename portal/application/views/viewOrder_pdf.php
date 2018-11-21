<?php 
  require_once(APPPATH.'third_party/html2pdf/html2pdf.class.php');
	$theme_path = THEMEPATH;
	$portal_path = PORTALPATH;

  $date = $order['order']->date;
  $date = new DateTime($date);
  $date = $date->format('Y-m-d');

  $html = '
<html>
    <head>
      <style>
      table {
        width:100%;
      }
      table, th, td {
        border: 0px solid black;
        border-collapse: collapse;
      }
      th, td {
        padding: 5px;
        text-align: left;
      }
      table#t01 tr:nth-child(even) {
        background-color: #eee;
      }
      table#t01 tr:nth-child(odd) {
       background-color:#fff;
      }
      table#t01 th  {
        background-color: black;
        color: white;
      }
      </style>
    </head>
  <body>
    <table align="center">
      <tr>
        <td>
          <table align="center">
            <tr>
              <td align="left" width="450">
                <h3>'.$company->name.'</h3>
                '.$company->address.' '.$company->address2.'
                <br>'.$company->address.', '.$company->state.' - '.$company->zip.' '.$company->country.'
                <br>Phone: '.$company->phone.'
              </td>
              <td aligne="right" width="200">
                <h3 align="center">Order # '.$order['order']->id.' </h3>
                <p><b>Order Placed On:</b>'.$date.'
                <br><b>Status:</b>'.$order['order']->status.'
                <br><b>Authorized Rep:</b>'.$order['order']->sales_rep_id.'</p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table align="center">
            <tr>
              <td align="left" width="300">
                <b>Bill To:</b><br>'
                .$order['order']->bill_company.'<br>'
                .$order['order']->bill_address.' '.$order['order']->bill_address2.'<br>'
                .$order['order']->bill_city.', '.$order['order']->bill_state.', '.$order['order']->bill_zip.', '.$order['order']->bill_country.'<br>
              </td>
              <td align="left"  width="300">
                <b>Ship To:</b><br>'
                .$order['order']->ship_company.'<br>'
                .$order['order']->ship_address.' '.$order['order']->ship_address2.'<br>'
                  .$order['order']->ship_city.', '.$order['order']->ship_state.', '.$order['order']->ship_zip.', '.$order['order']->ship_country.'
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <table border="1">
                  <tr>
                    <td width="300">
                      <b>Payment Method:</b><br>'
                    .$order['order']->pay_method.'<br>  
                    </td>
                    <td width="300">
                      <b>Shipping Method:</b><br>'
                    .$order['order']->ship_carrier.' '.$order['order']->ship_type.'<br>
                    </td> 
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table id="t01" align="center" border="1">
            <tr>
              <td align="center" colspan="7" width="700">
                <h4>Order Items</h4>
              </td>
            </tr>
            <tr>
              <th>#</th>
              <th>Code</th>
              <th>Description</th>
              <th>Quantity</th>
              <th>Price $</th>
              <th>Total $</th>
            </tr>';
            $i = 1;
            foreach($order['items'] as $item){
              if(array_key_exists("standard_products_id", $item))
              {
                $html .= "<tr>";
                $html .= "<td>".($i++)."</td>";
                $html .= "<td>".$item['code']."</td>";
                $html .= "<td>".$item['description']."</td>";
                $html .= "<td align=right>".$item['qty']."</td>";
                $pay = $item['unit_price'];
                $html .= "<td align=right>".number_format($pay, 2, ".", ",")."</td>";
                $total = $pay * $item['qty'];
                $html .= "<td align=right>".number_format($total, 2, ".", ",")."</td>";
                $html .= "</tr>";
              }
              if(array_key_exists("order_fees_id", $item))
              {
                $html .= "<tr>";
                $html .= "<td>".($i++)."</td>";
                $html .= "<td>".$item['code']."</td>";
                $html .= "<td>".$item['description']."</td>";
                $html .= "<td align=right>1</td>";
                $pay = $item['price'];
                $html .= "<td align=right>".number_format($pay, 2, ".", ",")."</td>";
                $total = $pay;
                $html .= "<td align=right>".number_format($total, 2, ".", ",")."</td>";
                $html .= "</tr>";
              }
            }
            $html .=  '                           
            <tr>
              <td colspan="5" align="right"><strong>Total</strong></td>
              <td align=right><strong>$'.number_format($order['order']->order_total, 2, ".", ",").'</strong></td>
            </tr>
            <tr>
              <td  align="center" colspan="7">
                '.$order['order']->notes.'
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>    
  </body>
</html>';

    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($html);
    $html2pdf->Output('exemple.pdf');


?>
