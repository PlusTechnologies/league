<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label>Full Name</label>
            {{Form::text('name[]', '', array('id'=>'firstname','class'=>'form-control','placeholder'=>'First Name','tabindex'=>'2')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group">
            <label>Date of Birth</label>
            {{Form::text('dob[]', '', array('id'=>'firstname','class'=>'form-control','placeholder'=>'First Name','tabindex'=>'2')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group">
            <label>Position</label>
            {{Form::text('position[]', '', array('id'=>'firstname','class'=>'form-control','placeholder'=>'First Name','tabindex'=>'2')) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group">
            <label>Gender</label>
            {{Form::text('gender[]', '', array('id'=>'firstname','class'=>'form-control','placeholder'=>'First Name','tabindex'=>'2')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group">
            <label>Graduation Year</label>
            {{Form::text('year[]', '', array('id'=>'firstname','class'=>'form-control','placeholder'=>'First Name','tabindex'=>'2')) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group">
            <label>US Lacrosse ID</label>
            {{Form::text('laxid[]', '', array('id'=>'firstname','class'=>'form-control','placeholder'=>'First Name','tabindex'=>'2')) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4">
        <p><a href="#">Removed</a></p>
    </div>
</div>

<hr>