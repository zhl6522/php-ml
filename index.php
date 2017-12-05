<?php

include_once 'vendor/autoload.php';

use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\NaiveBayes;

$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
$labels = ['a', 'a', 'a', 'b', 'b', 'b'];

$classifier = new KNearestNeighbors();
$classifier->train($samples, $labels);

echo $classifier->predict([3, 2]);
echo '<br/>';
echo $classifier->predict([1, 2]);

echo '<hr/>';

$samples = [[5, 1, 1], [1, 5, 1], [1, 1, 5]];
$labels = ['a', 'b', 'c'];

$classifier = new NaiveBayes();
$classifier->train($samples, $labels);

echo $classifier->predict([3, 1, 1]);// 返回 a
echo '<br/>';
$arr = $classifier->predict([[3, 1, 1], [1, 4, 1]]); //返回['a', 'b']
print_r($arr);
echo '<hr/>';
