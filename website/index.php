<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Concessionaria</title>
</head>
<body>
  <?php
    $result = file_get_contents("http://node-container:9001/carros");
    $products = json_decode($result);
  ?>
  <div>
    <table>
      <thead>
        <tr>
          <th>Placa</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Ano</th>
          <th>Preço</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($carros as $carro): ?>
          <tr>
            <td><?php echo $carro->placa; ?></td>
            <td><?php echo $carro->marca; ?></td>
            <td><?php echo $carro->modelo; ?></td>
            <td><?php echo $carro->ano; ?></td>
            <td><?php echo $carro->preco; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>