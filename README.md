# 模板变量替换
## 简要说明
能识别的变量格式为（正则表达式描述）：

    ${\s*[0-9a-zA-Z]+\s*}

变量样例如下：

${name}

${ name }

${ 1n12A }

具体的可以看 t.php 和 1.yml 中的使用。

## 用法样例:

> php convert.php  --template 1.yml  --var c.php

> php convert.php  --template t.php --var c.php

##  依赖:

window [下载 php](http://windows.php.net/download/)

linux 使用源或者自己编译安装。