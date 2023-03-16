<div>
    
     <form>

         {{-- STEP 1 --}}

         @if ($currentStep == 1)
             
      
         <div class="step-one">
             <div class="card">
                 <div class="card-header bg-secondary text-white" style="background-color: #3c63d2b8!important;border-color: #3c63d2b8!important">STEP 1/3 - Personal Details</div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Name REC</label>
                                 <input type="text" class="form-control" placeholder="Enter Name REC" value="{{Auth::user()->name}}" disabled >
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                             </div>
                         </div>   
                     </div>    
                 </div>
             </div>
         </div>
         @endif

         {{-- STEP 2 --}}

         @if ($currentStep == 2)
             
        
         <div class="step-two">
             <div class="card">
                 <div class="card-header bg-secondary text-white" style="background-color: #3c63d2b8!important;border-color: #3c63d2b8!important">STEP 2/3 - Address & Contacts</div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Email REC</label>
                                 <input type="email" class="form-control" placeholder="Enter Email REC" value="{{Auth::user()->email}}" disabled>
                                 <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         @endif
         {{-- STEP 3 --}}

         @if ($currentStep == 3)
             
     
        <div class="step-three">
            <div class="card">
                <div class="card-header bg-secondary text-white" style="background-color: #3c63d2b8!important;border-color: #3c63d2b8!important">STEP 3/3 - Frameworks experience</div>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Sender</th>
                                            <th scope="col">Messages</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @php
                                            $i = 1;
                                            @endphp
                                        @foreach ($messages as $value)
                                           @if ($value->resaver_name == Auth()->user()->id)
                                            <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $value->send_user->name }}</td>
                                            <td>                                              
                                              <a class="btn btn-md btn-primary" href="{{route('messages.received',['id' => $value->id])}}">View</a>
                                            </td>
                                            
                                            </tr>
                                             @endif 
                                        @endforeach
                                        </tbody>
                                        </table>
                </div>
            </div>
        
         @endif


         <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

            @if ($currentStep == 1)
                <div></div>
            @endif

            @if ($currentStep == 2  )
            {{--  || $currentStep == 3  --}}
                <button type="button" class="btn btn-md btn-danger" wire:click="decreaseStep">Back</button>
            @endif
            
            @if ($currentStep == 1 || $currentStep == 2 )
                <button type="button" class="btn btn-md btn-primary" wire:click="increaseStep()">Next</button>
            @endif
   
         </div>
     </form>
    </div>  
    </div>
 </div>
