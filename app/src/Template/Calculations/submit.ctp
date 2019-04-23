
<div class="row">
    <div class="columns large-6">
        <h4><b>Enter Dates : </b></h4>

        <?php 
            echo $this->Flash->render();
            echo $this->Form->create();  
            echo $this->Form->input('startdate',  ['class' => 'datepicker', 'label' => 'Enter Start Date :']);
            echo $this->Form->input('enddate',  ['class' => 'datepicker', 'label' => 'Enter End Date :']);
          
            echo $this->Form->button('Save');
        echo $this->Form->end();

       ?>

    </div>
    <hr />
</div>




<script>




    $(function(){
        $(".datepicker").datepicker({'dateFormat':'yy-mm-dd',
            changeMonth : true,
            changeYear : true
        });

    });
</script>