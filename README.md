# recruitment-php-code-test

## Question 4
### `geoHelperAddress()`
- 盡量避免巢狀的 if-else 判斷式，建議用 guard causes([wiki](https://en.wikipedia.org/wiki/Guard_(computer_science))) 的方式判斷各種狀況，其優點有：
  1. early exit: 一旦 catch 到狀況就能即時處理，及早結束 `geoHelperAddress()`
  2. 未來如果要新增其他的判斷條件，不會跟其他的條件式耦合（couple）在一起。
- 當 thrift 服務接口連失敗時在 `responseLog()` 中只有寫 HTTP status code 401(Unauthorized)，但失敗的可能有很多種。至少可以在 `$response` 中多偵測幾種常見的 HTTP `4xx`, `5xx` code，而不是每次失敗時都還要進一步去看 `responseLog()` 中提供的最後一個參數 `$response` ， debug 會比較快一點。

### `checkStatusCallback()`
- 程式碼沒有處理到未使用的狀態碼，例如如果呼叫 `checkStatusCallback("FD12345", 907)` 時會回調 `'FD12345-'`



## 步骤

```shell
git clone https://github.com/zitdev/recruitment-php-code-test.git
cd recruitment-php-code-test
composer install
#写一个App\Demo类的单元测试（文件名：tests/App/DemoTest.php）
#执行单元测试
./vendor/phpunit/phpunit/phpunit tests/App/DemoTest.php 
```
