<?php
//test for wp plugin branch
require_once('conf.php');
//====security checking
$validateUser = C_Security::validateUserSession();


//====Load all calendars
$allCals = new C_Calendar('LOAD_MY_CALENDARS');

//====Load calendar properties
$calendarProperties = $allCals->calendarProperties;

//====Load calendars
$allCalendars = $allCals->allCalendars;

//====Initiate Event Calendar Class
$pec = new C_PhpEventCal($calendarProperties);

//==== Setting Properties
$pec->header();
//$pec->firstDay(2);
//$pec->weekends();
//$pec->weekMode('liquid');
//$pec->weekNumbers(true);
//$pec->height(580);

//$pec->contentHeight(400);
//$pec->slotMinutes(50);
if(isset($_SESSION['currentView']) && $_SESSION['currentView']!=''){
    $pec->defaultView($_SESSION['currentView']); //month,basicWeek,agendaWeek,basicDay,agendaDay
    unset($_SESSION['currentView']);
}

//$pec->defaultView('pec');

//$pec->buttonText(array('prev'=>'Prev','next'=>'Next', 'agendaDay'=>'Agenda Day','basicDay'=>'Day','basicWeek'=>'Week','month'=>'Month','agendaWeek'=>'Agenda Week'));
$pec->buttonText(array('prev'=>'Prev','next'=>'Next', 'agendaDay'=>'Day','basicDay'=>'Day','month'=>'Month','agendaWeek'=>'Week','list'=>'Agenda'));

//===Each Event as a form of Array
$events = array(
//    array('id'=>178,'title'=>'My Event 1','start'=>'2014-02-10'),
//    array('id'=>178,'title'=>'My Event 2','start'=>'2014-02-17',),
//    array('id'=>178,'title'=>'My Event 3','start'=>'2014-02-24')
);

//==== find if one or more calendar(s) is/are having external URL(s), Ex: google URL
$activeExternalURLForCalendars = C_Events::findExternalURLForCalendars($_SESSION['userData']['active_calendar_id']);
//==== generate external URLs for calendars if any
if($activeExternalURLForCalendars) {
    $calURLs = NULL;
    foreach($activeExternalURLForCalendars as $k => $cal){
        $calURLs[] = array('url'=>$cal['description'],'color'=>$cal['color']);
    }
    if(!is_null($calURLs)) $pec->events($calURLs,'calendar');
}
else $pec->events($events);

//$pec->events(array('https://www.google.com/calendar/feeds/billahnorm%40gmail.com/public/basic','https://www.google.com/calendar/feeds/ngo11n296na6sb0v5gam8902ik%40group.calendar.google.com/public/basic'),'calendar');
//$pec->events($events);
/*
$moreEvents = array(
    array('title'=>'event6','start'=>'2013-11-17'),
    array('title'=>'event7','start'=>'2013-11-04','end'=>'2010-01-01'),
    array('title'=>'event8','start'=>'2013-11-20 12:30:00','allDay'=>false)
);

//==============================================
//TODO:Event Source is not working at the moment
$pec->eventSources(
    array('events'=>$moreEvents,'color'=>'red','textColor'=>'green','backgroundColor'=>'gray')
);
*/
//====================================================
//TODO: Google Event Feed is not working at the moment
//$pec->events('http://www.google.com/calendar/feeds/developer-calendar@google.com/public/full?alt=json-in-script','json');

$pec->editable(true);

$pec->dragOpacity(.2);
//$pec->firstDay(6);
//$pec->allDaySlot(true);
//$pec->fcFunction('viewRender',array());
//$pec->handleWindowResize(true);
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lawyers Scociety</title>
    <?php echo $pec->display('head');?>
    <style>
        .container {
            width: auto;
        }
        #add-calendar {
            cursor: pointer;
        }
        .list-group a {
            padding: 4px;
            text-align: left;
            padding-left: 10px;
            padding-right: 2px;
        }
        .list-group a:hover {
            opacity: 0.75;
        }
        .fc-header-right .fc-header-space {
            display: none;
        }
        .unselect-calendar {
            float: right;
            font-size: 8px;
            margin-top: 13px;
            display: inline-block;
            z-index: 10000;
        }
        .unselect-calendar:hover {
            text-shadow: 0 2px 5px black;
            color: maroon;
        }

    </style>
</head>

<body>
    <?php require_once(SERVER_HTML_INCLUDE_DIR.'top-navigation.html.php'); ?>
    <div class="container">

        <?php
        require_once(SERVER_HTML_DIR.'calendar-create.html.php');
        require_once(SERVER_HTML_DIR.'calendar-update.html.php');
        require_once(SERVER_HTML_DIR.'calendar-settings.html.php');
        ?>

        <div class="starter-template">
            <p class="lead">
                <div class="row">
                    <div class="col-md-2" style="padding: 0;max-width:225px;min-width:225px">
                        <!-- Create New Event Button -->
                        <div style="float: left; padding-left: 10px;">
                            <button type="button" class="btn btn-success" id="create-new-event" style="display:none">Create New Event</button>
                        </div>
                        <div style="clear: both; height: 17px; display: none"></div>
                        <!-- Date Picker -->
                        <div id="date-picker" style="border: 1px solid #d9d9d9; margin-left: 3px; margin-top: 0; padding-top: 0; border-radius: 2px"></div>


                       
                    </div>
                    <div class="col-md-10" style="overflow:hidden;float:inherit;width:inherit">
                        <?php
                            $pec->display_container();
                        ?>
                    </div>
                </div>
            </p>
        </div>



    </div><!-- /.container -->


    <?php
    //=====display
    $pec->display();
    ?>

    <?php
    //======display debug info
    $pec->display_debug();
    ?>
</body>

</html>