<?php
	Class ReservationSession
	{
		/*
		//optional: have a RoomCatalog as an instance variable, however i don't see why we should hold it in memory

		public function AddReservation(int roomNumber, Time startTime, Time endTime, Student student)
		{
			//Create a RoomCatalog object and call the GetRoom(int roomNumber) function. It will return a Room object, hold this Room object in a variable lets call it room;

			//if(room.IsAvailable())
			//room.AddReservation(Time startTime, Time endTime, Student student), it should return me an array of reservation, hold it in a variable, lets call it reservations

			//Create a ReservationCatalog Object and call AddReservation(Reservation[] reservations)

			//else
			//throw error or send an alert that the room is being used by someone
		}

		public function RemoveReservation(int roomNumber, Time startTime, Time endTime, Student student)
		{
			//Create a RoomCatalog object and call the GetRoom(int roomNumber) function. It will return a Room object, hold this Room object in a variable lets call it room;

			//if(room.IsAvailable())
			//room.RemoveReservation(Time startTime, Time endTime, Student student), it should return me an array of reservation ID, hold it in a variable, lets call it reservationsID

			//Create a ReservationCatalog Object and call RemoveReservation(int[] reservationsID)

			//in my head, each timeSlot has a single reservation and when removing the reservation, its ID is held in an array, when we are done removing all the reservation from a range of timeslot, we return the array.
			//the array is then used to remove the reservations that are held in ReservationCatalog

			//else
			//throw error or send an alert that the room is being used by someone
		}

		public function ModifyReservation(int roomNumber, Time startTime, Time endTime, Student student)
		{
			//Create a RoomCatalog object and call the GetRoom(int roomNumber) function. It will return a Room object, hold this Room object in a variable lets call it room;

			//if(room.IsAvailable())
			//room.ModifyReservation(Time startTime, Time endTime, Student student). It will return a DICTIONNARY, the dictionnary has 2 keys: AddedReservation and RemovedReservation. Each key is holding an array of reservation.

			//Create a ReservationCatalog Object

			//call RemoveReservation(Reservation[] reservations) using the RemovedReservation key
			//call AddReservation(Reservation[] reservations) using the AddedReservation Key
			
			//else
			//throw error or send an alert that the room is being used by someone
		}

		public function ViewReservation()
		{
			//Create a ReservationCatalog object, call the GetReservation() function
		}


		*/
	}
?>