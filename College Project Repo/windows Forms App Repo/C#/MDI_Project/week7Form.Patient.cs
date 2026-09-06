using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace WindowsFormsApplication2
{
    class week7FormPatient
    {

     

        public week7FormPatient(string _name, int _age, string _gender, string _area, int _specialityid)
               {
                        PatientName = _name;
                        Area = _area;
                        Gender = _gender;
                        Age = _age;
                        Specialityid = _specialityid;
                        
        }
            // Fields  
            private string _name;
            private int _age;
            private string _gender;
            private string _area;
            private int _specialityid;

            public int Specialityid
            {
                get { return _specialityid; }
                set { _specialityid = value; }
            }
            // Properties  
            public string PatientName
            {
                get { return _name; }
                set { _name = value; }
            }
            public string Area
            {
                get { return _area; }
                set { _area = value; }
            }
            public String Gender
            {
                get { return _gender; }
                set { _gender = value; }
            }
            public int Age
            {
                get { return _age; }
                set { _age = value; }
            }
        }
    
}
