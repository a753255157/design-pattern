#### 参考出处：

[在PHP中使用协程实现多任务调度](https://www.laruence.com/2015/05/28/3038.html)

#### 实现细节：

- `yield` 关键字将使一个普通函数变成 `Generator`。
- `Generator` 包含方法：
  - `valid()`：判断生成器是否完结。
  - `current()`：取生成器的当前值。
  - `send($value)`：将一个值发送给生成器，$value 将作为 `Generator` 内 `yield` 表达式的返回值。
  - `next()`：等价于 `send(null)`。
  - `getReturn()`：获取一个生成器内 `return` 语句返回的值。
  - `throw(Exception $e)`：手动引发生成器的一个异常。
  - `key()`：返回生成器当前 `yield` 的 `key`，类似 `array` 的 `key`。
  - `rewind()`：重置一个生成器。
- `Task` 类用于包装单个 `Generator`，主要处理 `Generator` 执行时第一次产生的值，和之后生成值（send）的方式，及包装 `valid()`。
- `Scheduler` 类用于调度 Task 类，借助 PHP 的 `SplQueue` 存放 Task，Task 出队列执行，如未执行完， Task 再放入队列。

##### send($value) 用法：

```php
function nums() {
    for ($i = 0; $i < 10; $i++) {
        //从调用中获取一个值
        $cmd = (yield $i);
        if($cmd == 'stop')
            return;// 终止生成器
        }     
}

$gen = nums();
foreach($gen as $v){
    if( $v == 3 )
        $gen->send('stop');
    echo "{$v}\n";
}
```

##### getReturn() 用法

```php
function t() {
    yield 1;
    yield 2;
    return 3;
}

$a = t();
$a->next(); // 有两个 yield 语句，就必须将 yield 全用完，才能调用 getReturn()，否则会报错
$a->next();
echo $a->getReturn();
```