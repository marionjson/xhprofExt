<?php


namespace xhprof\bean;


/***
 *
 * Class JsonBean
 * @package xhprof\bean
 */
class JsonBean
{
    /**
     * תΪ�ַ���
     * @param  $jsonObject
     * @return  string
     */
    public function __toJsonString($jsonObject = false)
    {
        return json_encode($this->__toArr($jsonObject));
    }

    /**
     * תΪ����
     * @param bool $jsonObject
     * @return array
     */
    private function __toArr($jsonObject): array
    {
        $jsonObject = $jsonObject ?: $this;
        $jsonArr = [];
        if ($jsonObject) {
            foreach ($jsonObject as $key => $vars) {
                if ($vars instanceof JsonBean) {
                    $arr = $vars->__toArr($vars);
                    $jsonArr[$key] = $arr;
                } else {
                    $jsonArr[$key] = $vars;
                }
            }
            return (array)$jsonArr;
        }
    }
}