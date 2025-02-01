<div class="frm">
    <div class="title-box">
        <div class="title">Add Customer</div>
        <div class="btn-close"><i class="fas fa-times"></i></div>
    </div>
    <form class="upl">
        <div class="body">
            <label style="display: none;">ID</label>
            <input type="text" id="txt-edit" name="txt-edit" value="0" hidden>
            <input type="text" name="txt-ID" id="txt-ID" class="frm-control" hidden>
            <label>FullName</label>
            <input type="text" name="txt-fullname" id="txt-fullname" class="frm-control" required>
            <label>Phone Number</label>
            <input type="text" name="txt-ph" id="txt-ph" class="frm-control" required>
            <label>Email</label>
            <input type="email" name="txt-Email" id="txt-email" class="frm-control" required>
            <label id="txt-pss">Password</label>
            <input type="password" name="txt-pass" id="txt-pass" class="frm-control" required>
            <label>Address</label>
            <select name="txt-select" id="txt-select" class="frm-control">
                <option value="Takeo">Takeo</option>
                <option value="pp">Pp</option>
            </select>
        </div>
        <div class="footer">
            <button type="button" class="btn btn-save">Save</button>
            <button type="reset" class="btn btn-cancel">Cancel</button>
        </div>
    </form>
</div>