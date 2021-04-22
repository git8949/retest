# retest
PHP正则表达式测试工具，封装PCRE函数，格式化输出，便于PHP正则表达式调试。

# 函数介绍
match: 正则匹配，执行preg_match并格式化输出

match_all: 正则匹配，执行preg_match_all并格式化输出

grep: 正则匹配，执行preg_grep并格式化输出

replace: 正则替换，执行preg_replace并格式化输出

filter: 正则替换，执行preg_filter并格式化输出

replace_callback: 正则替换，执行preg_replace_callback并格式化输出

replace_callback_array: 正则替换，执行preg_replace_callback_array并格式化输出

split: 正则分割，执行preg_split并格式化输出

quote: 转义正则表达式，执行preg_quote并格式化输出

print_pcre_func: 打印PCRE函数列表

# DEMO
<pre><code>
include_once 're.func.php';

$str = 'abc13822226666s';

match('/1[3-9]\d{9}/', $str, '提取手机号');
</code></pre>

# 运行截图
![image](https://upload-images.jianshu.io/upload_images/12714763-dbf10987fb4f21e0.png)

# 编程工具箱
![image](https://upload.jianshu.io/users/qrcodes/12714763/qrcode.jpg)