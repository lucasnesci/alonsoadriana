<div id="contact">
  <div class="alert alert-success text-center col-xs-12 col-md-12" role="alert"></div>
  <div class="alert alert-danger text-center col-xs-12 col-md-12" role="alert"></div>
  <div id="body" class="col-xs-12 col-md-12 black">
    <p>Complete el formulario y pronto me comunicare con usted.</p>
    <form id="contact-form" role="form" method="post" action="#/sendmail">
    <!--   <div class="alert alert-success text-center" role="alert"></div>
      <div class="alert alert-danger text-center" role="alert"></div> -->
      <div class="form-group">
        <label class="control-label">Nombre y apellido</label>
        <input name="name" type="text" class="form-control">
        <span class="glyphicon form-control-feedback hide"></span>
      </div>

      <div class="form-group">
        <label class="control-label">Correo electronico</label>
        <input name="email" type="email" class="form-control" id="email">
        <span class="glyphicon form-control-feedback hide"></span>
      </div>

      <div class="form-group">
        <label class="control-label">Comentario</label>
        <textarea name="comment" class="form-control" rows="4"></textarea>
        <span class="glyphicon form-control-feedback hide"></span>
      </div>

      <div class="form-group hide">
        <label class="control-label">Contacto</label>
        <input id="contact-box" name="contact-box" type="text" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Enviar comentario</button>
    </form>

    <!-- Add custom js for contact page -->
    <script type="text/javascript" src="js/contact.js"></script>
  </div>
</div>
