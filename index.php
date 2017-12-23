<?php
/**
 * Created by PhpStorm.
 * User: zhl
 * Date: 2017/12/23 0023
 * Time: 下午 3:39
 */
require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Association\Apriori;  //基于Apriori算法的频繁项目集挖掘关联规则学习。
use Phpml\Classification\SVC;   //支持向量机分类器实现基于LIBSVM。
use Phpml\SupportVectorMachine\Kernel;
use Phpml\Classification\KNearestNeighbors; //一种实现k-近邻算法的分类器。
use Phpml\Classification\NaiveBayes;    //基于朴素贝叶斯假设的特征之间的强（朴素）独立性分类器。

$samples = [['alpha', 'beta', 'epsilon'], ['alpha', 'beta', 'theta'], ['alpha', 'beta', 'epsilon'], ['alpha', 'beta', 'theta']];
$labels  = [];
$associator = new Apriori($support = 0.5, $confidence = 0.5);
$associator->train($samples, $labels);

$array = $associator->predict(['alpha','theta']);
print_r($array);
echo '<br/>';
$array = $associator->predict([['alpha','epsilon'],['beta','theta']]);
print_r($array);
echo '<br/>';
$array = $associator->getRules();
print_r($array);
echo '<br/>';
$array = $associator->apriori();
print_r($array);
echo '<hr/>';


$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
$labels = ['a', 'a', 'a', 'b', 'b', 'b'];
$classifier = new SVC(Kernel::LINEAR, $cost = 1000);
$classifier->train($samples, $labels);
echo $classifier->predict([3, 2]);
echo '<br/>';
$array = $classifier->predict([[3, 2], [1, 5]]);
print_r($array);
echo '<hr/>';


$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
$labels = ['a', 'a', 'a', 'b', 'b', 'b'];
$classifier = new KNearestNeighbors();
$classifier->train($samples, $labels);

echo $classifier->predict([3, 2]);
echo '<br/>';
$array = $classifier->predict([[3, 2], [1, 5]]);
print_r($array);
echo '<hr/>';


$samples = [[5, 1, 1], [1, 5, 1], [1, 1, 5]];
$labels = ['a', 'b', 'c'];
$classifier = new NaiveBayes();
$classifier->train($samples, $labels);

echo $classifier->predict([3, 1, 1]);
echo '<br/>';
$array = $classifier->predict([[3, 1, 1], [1, 4, 1]]);
print_r($array);
echo '<hr/>';