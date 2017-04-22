# 模板变量替换
## 简要说明
能识别的变量格式为（正则表达式描述）：

    ${\s*[0-9a-zA-Z._]+\s*}

变量样例如下：

${name}

${ name }

${ 1n12A }

具体的可以看 t.php 和 1.yml 中的使用。

## 用法样例:
- --template 必选； 模板，可以为任意文本文件
- --var 必选 ； 配置，格式固定，参考c.php
- --output 可选； 替换后的输出文件名


> php convert.php  --template 1.yml  --var c.php

> php convert.php  --template t.php --var c.php

> php convert.php  --template t.php  --var c.php --output output.php


当配置是json格式的的时候:(其实 convert_json.php 将json 转换成php 数组)

> php convert.php  --template 1.yml --var json_type.php --json config.json

##  依赖:

window [下载 php](http://windows.php.net/download/)

linux 使用源或者自己编译安装。