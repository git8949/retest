<?php
    //正则匹配，执行preg_match并格式化输出
    function match($re, $str, $remark='正则匹配'){
        $ret = preg_match($re, $str, $data);
        show($re, $str, $remark, $data, __FUNCTION__, $ret);
        return $ret;
    }

    //正则匹配，执行preg_match_all并格式化输出
    function match_all($re, $str, $remark='全局匹配'){
        $ret = preg_match_all($re, $str, $data);
        show($re, $str, $remark, $data, __FUNCTION__, $ret);
        return $ret;
    }

    //正则匹配，执行preg_grep并格式化输出
    function grep($re, $array, $remark='筛选数组元素'){
        $ret = preg_grep($re, $array);
        show($re, $array, $remark, $ret, __FUNCTION__);
        return $ret;
    }

    //正则替换，执行preg_replace并格式化输出
    function replace($re, $rep, $str, $remark='正则替换'){
        $data = preg_replace($re, $rep, $str);
        show($re, $str, $remark, $data, __FUNCTION__);
        return $data;
    }

    //正则替换，执行preg_filter并格式化输出
    function filter($re, $rep, $str, $remark='正则替换'){
        $data = preg_filter($re, $rep, $str);
        show($re, $str, $remark, $data, __FUNCTION__);
        return $data;
    }

    //正则替换，执行preg_replace_callback并格式化输出
    function replace_callback($re, $cb, $str, $remark='正则替换'){
        $data = preg_replace_callback($re, $cb, $str);
        show($re, $str, $remark, $data, __FUNCTION__);
        return $data;
    }

    //正则替换，执行preg_replace_callback_array并格式化输出
    function replace_callback_array($re_map, $str, $remark='正则替换'){
        $data = preg_replace_callback_array($re_map, $str);
        show($re_map, $str, $remark, $data, __FUNCTION__);
        return $data;
    }

    //正则分割，执行preg_split并格式化输出
    function split($re, $str, $remark='正则分割'){
        $data = preg_split($re, $str);
        show($re, $str, $remark, $data, __FUNCTION__);
        return $data;
    }

    //转义正则表达式，执行preg_quote并格式化输出
    function quote($re, $delimiter='', $remark='转义正则表达式'){
        $ret = preg_quote($re, $delimiter);
        show($re, '', $remark, $ret, __FUNCTION__);
        return $ret;
    }

    /**
     * 返回PCRE正则函数的说明
     * @param string $key
     * @return array|mixed   $key为空则返回所有函数
     */
    function get_pcre_func($key=''){
        $list = [
            'match'=>[
                'remark'=>'执行一个正则表达式匹配',
                'desc'=>'int preg_match ( string $pattern , string $subject [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]] )',
            ],
            'match_all'=>[
                'remark'=>'执行一个全局正则表达式全局匹配',
                'desc'=>'int preg_match_all ( string $pattern , string $subject [, array &$matches [, int $flags = PREG_PATTERN_ORDER [, int $offset = 0 ]]] )',
            ],
            'grep'=>[
                'remark'=>'返回匹配模式的数组元素',
                'desc'=>'array preg_grep ( string $pattern , array $input [, int $flags = 0 ] )',
            ],
            'replace'=>[
                'remark'=>'执行一个正则表达式的搜索和替换',
                'desc'=>'mixed preg_replace ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )',
            ],
            'replace_callback'=>[
                'remark'=>'执行一个正则表达式搜索并且使用一个回调进行替换',
                'desc'=>'mixed preg_replace_callback ( mixed $pattern , callable $callback , mixed $subject [, int $limit = -1 [, int &$count ]] )',
            ],
            'replace_callback_array'=>[
                'remark'=>'执行一个正则表达式搜索并且使用一个回调进行替换',
                'desc'=>'mixed preg_replace_callback_array ( array $patterns_and_callbacks , mixed $subject [, int $limit = -1 [, int &$count ]] )',
            ],
            'filter'=>[
                'remark'=>'执行一个正则表达式搜索和替换',
                'desc'=>'mixed preg_filter ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )',
            ],
            'split'=>[
                'remark'=>'通过一个正则表达式分隔字符串',
                'desc'=>'array preg_split ( string $pattern , string $subject [, int $limit = -1 [, int $flags = 0 ]] )',
            ],
            'quote'=>[
                'remark'=>'转义正则表达式字符',
                'desc'=>'string preg_quote ( string $str [, string $delimiter = NULL ] )',
            ],
            'last_error'=>[
                'remark'=>'返回最后一个PCRE正则执行产生的错误代码',
                'desc'=>'int preg_last_error ( void )',
            ],
        ];
        if($key) return isset($list[$key]) ? $list[$key] : ['remark'=>$key, 'desc'=>$key];
        return $list;
    }

    //全局变量，是否加载了CSS样式
    $is_load_css = false;

    //加载CSS样式
    function load_css(){
        global $is_load_css;
        if(!$is_load_css){
            $is_load_css = true;//设置为true,避免重复加载样式
            echo <<<STYLE
            <style type="text/css">
            table{background-color:#F6F4F0;color:#00667C;border-collapse:collapse;margin:20px;float:left;text-align:left;}
            td, th{border:1px solid #D4D4D4;padding:10px;}
            td{min-width:400px;}
            .re{color:#E46430;font-weight:bold;font-size:24px;}
            .orange{color:#E46430;}
            </style>
STYLE;
        }
    }

    /**
     * 格式化输出结果
     * @param $re      正则表达式
     * @param $str     原始字符串/数组
     * @param $remark  备注/注释
     * @param $res     匹配结果
     * @param $func    所用正则函数key
     * @param $ret     返回结果
     */
    function show($re, $str, $remark, $res, $func, $ret=0){
        load_css();
        $arr = [$re,$str,$res, $ret];
        foreach($arr as &$var){
            if(empty($var)) continue;
            if(is_array($var)){
                $var = '<pre>'.print_r($var, true).'</pre>';
            }else if(is_string($var)){
                $var = htmlentities($var);
                $var = str_replace("\n", '<br>', $var);
            }
        }
        list($re, $str, $res, $ret) = $arr;
        $func_info = get_pcre_func($func);
        $html = '<table>';
        if(!empty($str)){
            $html .= <<<TR
                <tr>
                    <th>原始字符串：</th>
                    <td>$str</td>
                </tr>
TR;
        }
        $html .= <<<TABLE
                <tr>
                    <th>正则表达式：</th>
                    <td class="re">$re</td>
                </tr>
                <tr>
                    <th>功能描述：</th>
                    <td>$remark</td>
                </tr> 
                <tr>
                    <th>正则函数：</th>
                    <td><span class="orange" title="$func_info[remark]\n$func_info[desc]">preg_$func</span></td>
                </tr>
TABLE;
        if($func=='match' || $func=='match_all'){
            $html .= <<<TABLE
                <tr>
                    <th>匹配结果：</th>
                    <td>$res</td>
                </tr>
                <tr>
                    <th>返回结果：</th>
                    <td>$ret</td>
                </tr>
            </table>
TABLE;
        }else{
            $html .= <<<TABLE
                <tr>
                    <th>返回结果：</th>
                    <td>$res</td>
                </tr>
            </table>
TABLE;
        }
        echo $html;
    }

    //打印PCRE函数列表
    function print_pcre_func(){
        load_css();
        $funcs = get_pcre_func();
        $html = '<table><tr><th colspan="3" align="center">PCRE函数列表</th></tr>';
        foreach($funcs as $key=>$func){
            $html .= <<<TR
                <tr>
                    <th class="orange">preg_$key</th>
                    <th>$func[remark]</th>
                    <th>$func[desc]</th>
                </tr>
TR;

        }
        $html .= '</table>';
        echo $html;
    }
?>