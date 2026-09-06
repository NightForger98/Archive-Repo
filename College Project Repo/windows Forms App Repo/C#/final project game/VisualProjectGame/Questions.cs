using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml.Linq;

namespace VisualProjectGame
{
    internal class Questions
    {
        String ques;
        String ans1;
        String ans2;
        String ans3;
        String ans4;
        int correct;
        public Questions(String ques, String ans1, String ans2, String ans3, String ans4,int correct) {
             this.ques = ques;
            this.ans1 = ans1;
            this.ans2 = ans2;
            this.ans3 = ans3;
            this.ans4 = ans4;
            this.correct = correct;
        
        }
        public string Ques { get => ques; set => ques = value; }
        public string Ans1 { get => ans1; set => ans1 = value; }
        public string Ans2 { get => ans2; set => ans2 = value; }
        public string Ans3 { get => ans3; set => ans3 = value; }
        public string Ans4 { get => ans4; set => ans4 = value; }
        public int Corr { get => correct; set => correct = value; }
    }
}
