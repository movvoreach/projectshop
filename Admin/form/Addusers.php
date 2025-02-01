<div class="frm">
    <div class="title-box">
        <div class="title">Add Employees</div>
        <div class="btn-close"><i class="fas fa-times"></i></div>
    </div>
    <form class="upl">
        <div class="body">
            <label>ID</label>
            <input type="text" id="txt-edit" name="txt-edit" value="0" hidden>
            <input type="text" name="txt-ID" id="txt-ID" class="frm-control">
            <label>Full Name</label>
            <input type="text" name="txt-fullname" id="txt-fullname" class="frm-control" required>
            <label>Phone Number</label>
            <input type="text" name="txt-ph" id="txt-ph" class="frm-control" required>
            <label>Email</label>
            <input type="email" name="txt-od" id="txt-email" class="frm-control" required>
            <label id="txt-pss">Password</label>
            <input type="password" name="txt-pass" id="txt-pass" class="frm-control" required>
            <label>Status</label>
            <select name="txt-select" id="txt-select" class="frm-control">
                <option value="IT">IT</option>
                <option value="Service">Service</option>
            </select>
            <label>Photo</label>
            <div class="img-box">
                <input type="file" name="txt-photo" id="txt-photo" class="frm-control">
                <!-- <input type="file" name="txt-photo" id="txt-photo" class="frm-control"> -->
                <input type="text" name="txt-photo" id="txt-img" hidden>
            </div>
        </div>
        <div class="footer">
            <button type="button" class="btn btn-save">Save</button>
            <button type="reset" class="btn btn-cancel">Cancel</button>
        </div>
    </form>
</div>