<?php $this->view('pagetop'); ?>

    <div class="content">
        <div class="container-fluid">
            <form action="<?= $formAction ?>"  method="post">
                <p>Nom du client : <input type="text" name="name" value="<?= $customerName ?>"/></p>
                <button>
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>

<?php $this->view('pagebottom'); ?>