###接口信息
[
    {
        "name":"接口名称",
        "method":"请求接口方式方法: get,post,head,put,delete,options...",
        "url":"接口地址： /user/info",
        "desc":"接口说明",
        "target":"form表单目标，默认空，如果是上传文件则需要设置成_blank或者其他",
        "projectid": "所属项目id,如租房，新房，二手房，二手车，购物车，商祥",
        "categoryid":"接口分类（大类）:用户,系统...",
        "sub_categoryid":"接口分类（子类）:基本信息",
        "headers":[#请求头配置
            {
                "key":"请求头名",
                "val":"请求头值",
            },
            {
                "key":"请求头名",
                "val":"请求头值",
            }
        ],
        "body_type":"body请求类型，如form-data，x-www-form-urlencoded，raw，binary",
        "body":[ #请求参数
            {
                "key":"参数名称",
                "val":"默认值",
                "required":"是否必须 true/false",
                "data_type":"数据类型，int，string，bool，array，object",
                "desc":"参数描述",
                "form_type":"参数在表单中展示类型，默认text，上传文件为file，textarea，radio，checkbox"
            },{...}
        ],
        "response_type":“响应结果类型，字符串，xml，json”，
        "response_val":[#响应结果
            {
                "key":"返回值字段名称",
                "val":"返回值",
                "desc":"返回值描述"
            },
            {
                "key":"返回值名称",
                "val":"返回值",
                "desc":"返回值描述",
                
            }
        ]
    }
]

项目管理： 
  1. 项目基本信息： 项目名称，项目描述，项目归属（技术部门-产品业务线-自定义分组）
  2. 项目成员
接口管理： 接口基本信息，接口所属项目，
批量导出接口为pdf，word，excel文档

