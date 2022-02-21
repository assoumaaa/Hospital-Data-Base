# Hospital-Data-Base


<img src="https://user-images.githubusercontent.com/94231603/154779830-5a4ff101-903c-4f47-b043-e31bb1167382.gif" width="1500" height="500">

NOTE: This is a group project by myself and  [IamTaio](https://github.com/IamTaio)



Whats used in this project?: 
- HTML, CSS, PHP

Whats the point of this project?: 
- The Hospital Management System we are proposing is a computerized database system that replaces the manual systems and fixes most of the issues of the manual systems. It would be faster, require less human input to operate, would need a lot less space, and reduce the risk of information loss.

Project in Details:
- Implemented multiple tables such as patients which is made up of ID,FullName,age,weight,height,gender. Doctor Table specifing his/her ID and its specialization with his/her cost. Rooms table that is used to store the ID of the room and the type of it (Normal or intesnive care) and the status of it (empty or occupied).Consultation table with doctorID,patientID,billID and consult date.Payment table linking the patients ID with the bill ID and finding the total ammount of his cost and adding it to this specific patient.
- Ability to add Patients(ID,name,lastname,bloodtype etc...),Doctors,Doctors Specializations and Patients to specific rooms.
- Ability to find Patients room and their bill according to their ID.
- Ability to set occuptied rooms into empty according to thier roomID.
- Ability to delete patients from all of our database.
- Assigning patients to consultaiton according to their needs and showing the preferred doctors to pick from (according to their specialization)
- Showing all payments (consultation or roomStay) by a specific patient according to their ID and allowing them to pay.
