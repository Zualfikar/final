<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container" >
<form>
  <div class="row h-50">
    <div class="col-6" style="">
  <div class="form-group">
    <label for="exampleInputEmail1">Course Title</label>
    <input type="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
  <!--   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
   <div class="form-group">
     <label for="exampleInputEmail1">Course Type</label>
  <input list="type1" class="form-control" name="type1">

<datalist id="type1">
  <option value="full-stack">
  <option value="front-end">
  <option value="back-end">
  <option value="javascript">
    <option value="paython">
      <option value="seminar">
        <option value="html-css">
          <option value="ux-design">
            <option value="java">
</datalist>
  </div>
  <div class="form-group">
     <label for="exampleInputEmail1">Course Level</label>
  <input list="type2" class="form-control" name="type2">

<datalist id="type2">
  <option value="Beginners">
  <option value="Advanced">
  
</datalist>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Place</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Place">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Price in €">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Capacity</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Number of the trainees">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Start date</label>
    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">End date</label>
    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
 <div class="col-6" style="">
 <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
   
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Duration</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Times</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">More details</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  
</div>
</div>
<div class="row">
  <div class="col-6">
    <div class="form-group">
    <label for="exampleInputPassword1">Teachers</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
  </div>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Benefits</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Method</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Requirments</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</div>
</div>


</form>
</div>
</body>
</html>