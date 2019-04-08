<?php

  echo '

  <form action="statistics.php" method="POST">
  <div>
        <label>1. Что нужно записать в ячейки изначально?</label>
      <p><input name="q1" type="radio" value="a"> Основную матрицу системы </p>
      <p><input name="q1" type="radio" value="b">Столбец свободных членов</p>
      <p><input name="q1" type="radio" value="c">Основную матрицу системы и столбец свободных членов</p>
  </div>

  <div>
      <label>2. При каком условии можно решить систему n линейных алгебраических уравнений с n неизвестными матричным методом?  </label>
      <p><input name="q2" type="radio" value="a">Вообще нельзя</p>
      <p><input name="q2" type="radio" value="b">Когда определитель основной матрицы системы равен 0</p>
      <p ><input name="q2" type="radio" value="c">Когда определитель основной матрицы системы отличен от 0</p>
  </div>

  <div>
      <label>3. С помощью какой формулы вычисляется обратная матрица?  </label>
      <p><input name="q3" type="radio" value="a">МУМНОЖ</p>
      <p><input name="q3" type="radio" value="b">МОБР</p>
      <p ><input name="q3" type="radio" value="c">МИК</p>
  </div>

  <div>
      <label>4. Умножая что на что можно получить решение системы? </label>
      <p><input name="q4" type="radio" value="a">Обратную матрицу на матрицу </p>
      <p><input name="q4" type="radio" value="b">Обратную матрицу на столбец свободных членов</p>
      <p ><input name="q4" type="radio" value="c">Матрицу на столбец свободных членов</p>
  </div>

  <input name="my_result" type="submit" class="btn btn-outline-info" value="Мой результат" >
  </form>

  ';


?>
