<div class="container" style="align-items:center;  width:90%">
  <?php
  foreach ($menuData as $categoria => $options) {
    ?>
    <div class="heading">
      <h1> <?php echo $categoria ?> </h1>
    </div>

    <table id="example" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th rowspan="2">Descritivo</th>
          <th colspan="3" class='bg-price'>Preço por</th>
          <th colspan="4" class='bg-board'>Tabuleiro para </th>
          <th rowspan="2">Mínimo<br>para<br>encomenda</th>
        </tr>
        <tr>
          <th class='bg-price'>unidade</th>
          <th class='bg-price'>pessoa</th>
          <th class='bg-price'>Kg</th>
          <th class='bg-board'>4 pessoas</th>
          <th class='bg-board'>6 pessoas</th>
          <th class='bg-board'>10 pessoas</th>
          <th class='bg-board'>15 pessoas</th>
        </tr>
      </thead>
      <?php

        foreach ($options as $v) {
          echo '<tr>'
            . '<td>' . $v['descritivo'] . '</td>'
            . '<td>' . currency($v['unidade']) . '</td>'
            . '<td>' . currency($v['pessoa']) . '</td>'
            . '<td>' . currency($v['kg']) . '</td>'
            . '<td>' . currency($v['tab4']) . '</td>'
            . '<td>' . currency($v['tab6']) . '</td>'
            . '<td>' . currency($v['tab10']) . '</td>'
            . '<td>' . currency($v['tab15']) . '</td>'
            . '<td>' . $v['minimo'] . '</td>'
            . '</tr>';
        }
    ?>
    </table>
  <?php
  }
  ?>
</div>
