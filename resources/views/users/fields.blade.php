<div class="form-group col-sm-6">

    <div class="card">

      <div class="card-body">
        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
         @csrf
          <div class="form-group">
            <label for="program">Which Program</label>
            <select class = 'form-control' id='program' name="program"  multiple>
                <option value="global-entry" selected>Global Entry</option>
                <option value="sentri">Sentri</option>
                <option value="nexus">Nexus</option>
              </select>
             </div>


              <div class="form-group">
                <label for="program">Has your Global Entry / SENTRI / NEXUS application been conditionally approved?</label>
                <select class = 'form-control' id='is_approved' name="is_approved" multiple>
                    <option value="yes" selected>Yes</option>
                    <option value="no">No</option>
                    <option value="not-sure">Not Sure</option>
                  </select>
                 </div>

                 <div class="form-group">
                    <label for="program">Have you already booked interview?</label>
                    <select class = 'form-control' id='is_interview_booked' name="is_interview_booked" multiple>
                        <option value="yes" selected>Yes</option>
                        <option value="no">No</option>
                        <option value="not-sure">Not Sure</option>
                      </select>
                     </div>

                     <div class="form-group">
                        <label for="program">Have you already booked an interview appointment?</label>
                        <select class = 'form-control' id='alert' name="alert" multiple>
                            <option value="yes" selected>Yes, but I'd like to find a sooner one</option>
                            <option value="no">No, my location has no suitable appointments available</option>

                          </select>
                         </div>
         <!-- Submit Field -->
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}


    <button type="submit" id = "register" class="btn btn-primary">Submit</button>
     <a href="{{ url('sendSMS') }}" class="active">Next</a>

    {{-- <a href="{!! route('users.stripe') !!}" class="btn btn-primary">Next</a> --}}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
        </form>
      </div>
    </div>
  </div>




  {{-- add apoinment work --}}

  <div class="form-group col-sm-6">

    <div class="card">

      <div class="card-body">
        <form name="add-appoinment-form" id="add-appoinment-form" method="post" action="{{url('store-appointment-form')}}">
         @csrf
          <div class="form-group">
            <label for="program">Location Id</label>

            <select name="locationId" id="locationId" class="locationId">
                <option disable selected>--Select Country--</option>
                @foreach($locations  as $item)
                <option value="{{ $item->id }}">{{ $item->name}}</option>
            @endforeach
            </select>


             </div>


              <div class="form-group">
                <label for="program">Date of Appoinment</label>
                <input type="date" class = 'form-control' id='date_of_appoinment' name="date_of_appoinment" />

                 </div>

                 <div class="form-group">
                    <label for="program">Phone Number</label>
                    <input type="number" class = 'form-control' id='ph_number' name="ph_number" />
                     </div>

                     <div class="form-group">
                        <label for="program">Email Address</label>
                        <input type="text" class = 'form-control' id='email' name="email" />
                         </div>



    <button type="submit" id = "register" class="btn btn-primary">Submit</button>

    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
        </form>
      </div>
    </div>
  </div>
