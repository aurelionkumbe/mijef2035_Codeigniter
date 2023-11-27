<!-- Modal : Formulaire d, insertion des proprietes de livres -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close"
data-dismiss="modal" aria-hidden="true">
&times;
</button>
<h4 class="modal-title" id="myModalLabel">&nbsp;<span class="modalNotify" hidden><img src="<?=asset_url('img/tick.png')?>" alt="bien"></span></h4>
</div>
<div class="modal-body col-md-12">
<?php include_once(VIEWPATH.'layouts/formulaire.php') ?>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default"
data-dismiss="modal">Close
</button>
<button type="button" id="submitChange" class="btn btn-primary">
Submit changes
</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal -->  




<!-- Modal -->
<div class="modal fade" id="add-book-form-modal" tabindex="-1" role="dialog" aria-labelledby="add-book-form-modal-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add-book-form-modal-label">Modal title</h4>
      </div>
      <div class="modal-body">
         <?php include_once VIEWPATH.'layouts/add_book_form.php' ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


