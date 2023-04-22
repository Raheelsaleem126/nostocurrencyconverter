<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currency Coversion</title>
</head>
<body>
    
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Currency Converter</h4>
          <form method="post" action="{{ url('convert_currency') }}">
            @csrf
            <div class="form-group">
              <label for="convert_amount">Amount:</label>
              <input type="number" id="convert_amount" name="convert_amount" class="form-control select-two" required>
            </div>
      
            <div class="form-group">
              <label for="from_currency">From:</label>
                <select id="from_currency" name="from_currency" class="form-control select-two">
                    <option value="">Select Currency</option>
                    @foreach($all_currency_code as $key=>$status)
                    <option value="{{$status}}" >{{$status}}</option>
                    @endforeach
                </select>
            </div>
      
            <div class="form-group">
              <label for="to_currency">To:</label>
                <select id="to_currency" name="to_currency" class="form-control select-two">
                    <option value="">Select Currency</option>
                    @foreach($all_currency_code as $key=>$status)
                    <option value="{{$status}}" >{{$status}}</option>
                    @endforeach
                </select>
            </div>
      
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      
</body>
<style>

.select-two {
  display:flex;
  flex-direction: column;
  position:relative;
  width:100%;
}
.card {
  width: 400px;
  margin: auto;
  margin-top: 50px;
  border: 1px solid #eee;
  border-radius: 10px;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 20px;
}

.card-title {
  margin-bottom: 20px;
  font-size: 24px;
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-size: 16px;
  font-weight: 500;
}


button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  font-size: 16px;
  font-weight: 500;
  line-height: 1.5;
  color: #fff;
  background-color: #007bff;
  border: none;
  border-radius: 5px;
  box-shadow: none;
  cursor: pointer;
  transition: background-color ease-in-out .15s;
}

button[type="submit"]:hover {
  background-color: #0069d9;
}

.form-control:focus {
  border-color: #007bff;
  outline: none;
  box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
}

</style>
</html>