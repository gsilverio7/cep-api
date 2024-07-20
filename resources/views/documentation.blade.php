<!DOCTYPE html>
<html>
<head>
    <title>CEP API - Docs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/5.1.3/swagger-ui.css" integrity="sha512-sgYTxpBWckqYBbs7HbUcAZPpLq2nBqtITfwlXc8tIG+8OgusT3YUwoKIwYYX6vCkNbsknr2FELbgB2sqVe5zZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="ui-wrapper-new">
        Loading....
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/5.1.3/swagger-ui-bundle.js" integrity="sha512-Ykto0zfR5srIdvI1T4vbYEWEPEMFtWOKz8E4/t1SYf/gcXuiuDEbtOoXH4p6887kY3O3GezjApLzFmPbrZ+54w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var swaggerUIOptions = {
      url: "openapi.json",
      dom_id: '#ui-wrapper-new',
      docExpansion: 'list',
      deepLinking: true,
      filter: true,
      presets: [
        SwaggerUIBundle.presets.apis,
        SwaggerUIBundle.SwaggerUIStandalonePreset
      ],
      plugins: [
        SwaggerUIBundle.plugins.DownloadUrl
      ],
    }

    var ui = SwaggerUIBundle(swaggerUIOptions)
    window.ui = ui
</script>
</html>
