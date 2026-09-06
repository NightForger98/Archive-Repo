using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace WindowsFormsApplication2
{
    class Speciality
    {
        private string _specialityName;

public string SpecialityName
{
  get { return _specialityName; }
  set { _specialityName = value; }
}
        private int _specialityid;

        public int Specialityid
        {
            get { return _specialityid; }
            set { _specialityid = value; }
        }


        public Speciality(string _specialityName, int _specialityid)
                    {
                        SpecialityName = _specialityName;
                        Specialityid = _specialityid;
                        
        }
    }
}
