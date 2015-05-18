<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Uploadify</title>
    <link href="JS/jquery.uploadify-v2.1.0/example/css/default.css"
     rel="stylesheet" type="text/css" />
    <link href="JS/jquery.uploadify-v2.1.0/uploadify.css"
     rel="stylesheet" type="text/css" />

    <script type="text/javascript"
     src="JS/jquery.uploadify-v2.1.0/jquery-1.3.2.min.js"></script>

    <script type="text/javascript"
     src="JS/jquery.uploadify-v2.1.0/swfobject.js"></script>

    <script type="text/javascript"
   src="JS/jquery.uploadify-v2.1.0/jquery.uploadify.v2.1.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#uploadify").uploadify({
                'uploader': 'JS/jquery.uploadify-v2.1.0/uploadify.swf',
                'script': 'UploadHandler.ashx',
                'cancelImg': 'JS/jquery.uploadify-v2.1.0/cancel.png',
                'folder': 'UploadFile',
                'queueID': 'fileQueue',
                'auto': false,
                'multi': true
            });
        });  
    </script>

</head>
<body>
    <div id="fileQueue"></div>
    <input type="file" name="uploadify" id="uploadify" />
    <p>
      <a href="javascript:$('#uploadify').uploadifyUpload()">上传</a>| 
      <a href="javascript:$('#uploadify').uploadifyClearQueue()">取消上传</a>
    </p>
</body>
</html>

public void ProcessRequest(HttpContext context)
{
    context.Response.ContentType = "text/plain";   
    context.Response.Charset = "utf-8";   

    HttpPostedFile file = context.Request.Files["Filedata"];   
    string  uploadPath = 
        HttpContext.Current.Server.MapPath(@context.Request["folder"])+"\\";  

    if (file != null)  
    {  
       if (!Directory.Exists(uploadPath))  
       {  
           Directory.CreateDirectory(uploadPath);  
       }   
       file.SaveAs(uploadPath + file.FileName);  
        //下面这句代码缺少的话，上传成功后上传队列的显示不会自动消失
       context.Response.Write("1");  
    }   
    else  
    {   
        context.Response.Write("0");   
    }  
}