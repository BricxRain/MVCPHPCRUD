<?php include "templates/header.php" ?>

    <h1>Welcome!</h1>

    <br>

    <button class="btn btn-success addMigration">Add Migration</button>

    <br>
    <br>

    <table class="table table-striped tblMigrations">
        <thead>
        <tr>
            <th>ID</th>
            <th>Migration</th>
            <th>Batch</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


    <!-- The Modal -->
    <div class="modal" id="modalAddEditMigration">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Migration</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <input type="hidden" class="id" name="" id="">

                <label for="">Migration</label>
                <input type="text" class="form-control migration" name="" id="">

                <label for="">Batch</label>
                <input type="number" class="form-control batch" name="" id="">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-success btnSaveMigration">Save</button>
            </div>

            </div>
        </div>
    </div>

    <?php include "assets/scripts/index.js.php" ?>

<?php include "templates/footer.php" ?>