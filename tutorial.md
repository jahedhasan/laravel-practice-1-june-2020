# for php unique id generation 

~~~php
uniqid();
~~~

# Date and time Picker
  
  download    
  git clone git://github.com/smalot/bootstrap-datetimepicker.git    

  need to link  css and js file

## inside blade file
~~~php
$('#datetimepicker').datetimepicker({
    format: 'yyyy-mm-dd hh:ii'
});
~~~


## Route id never having `$` sign. 

~~~php
Wrong
Route::put('reservation/{$id}', 'ReservationController@status')->name('reservation.status');

Right
Route::put('reservation/{id}', 'ReservationController@status')->name('reservation.status');
~~~
