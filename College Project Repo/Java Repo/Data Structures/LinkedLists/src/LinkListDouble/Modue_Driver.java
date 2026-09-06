package LinkListDouble;

import java.util.Scanner;

public class Modue_Driver {
public static void main(String[] args) {
	
	
	Scanner scan = new Scanner (System.in);
	SingleLinkedList<Character> sll1 = new SingleLinkedList<Character>();
	SingleLinkedList<Character> sll2 = new SingleLinkedList<Character>();
	SingleLinkedList<Character> sll2R = new SingleLinkedList<Character>();
	//classwork
	//first list
	SingleLinkedList<Integer> sortedSLL1 = new SingleLinkedList<Integer>();
			sortedSLL1.addNodeInPlace(new Node<Integer>(89));
			sortedSLL1.addNodeInPlace(new Node<Integer>(-4));
			sortedSLL1.addNodeInPlace(new Node<Integer>(69));
			sortedSLL1.addNodeInPlace(new Node<Integer>(101));
			sortedSLL1.addNodeInPlace(new Node<Integer>(-10));
			sortedSLL1.addNodeInPlace(new Node<Integer>(94));
			sortedSLL1.addNodeInPlace(new Node<Integer>(10));
			sortedSLL1.addNodeInPlace(new Node<Integer>(20));
		
			//manual list manipulation
			Node <Integer> head;
			Node <Integer> tail;
			Node <Integer> first = new Node <Integer>();
			Node <Integer> second = new Node <Integer>();
			Node <Integer> third= new Node <Integer>();
			Node <Integer> fourth = new Node <Integer>();
			Node <Integer> fifth= new Node <Integer>();
			Node <Integer> sixth= new Node <Integer>();
			Node <Integer> seventh= new Node <Integer>();


			first.setItem(10);
			second.setItem(15);
			third.setItem(36);
			fourth.setItem(40);
			fifth.setItem(101);
			sixth.setItem(616);
			seventh.setItem(69);
			first.setNext(second);
			second.setNext(third);
			third.setNext(fourth);
			fourth.setNext(fifth);
			fifth.setNext(sixth);
			sixth.setNext(null);
			head=first;
			System.out.println("Integers:");
			do {System.out.print(head.getItem()+" , ");
			head=head.getNext();
			}while(head != null);
			System.out.println();
			tail = first;
			head = first.getNext();
			if(seventh.getItem() <= first.getItem()) {
				seventh.setNext(first);
				first=seventh;
			}else {
				while(head != null && head.getItem() < seventh.getItem()) {
					head= head.getNext(); 	
					tail = tail.getNext();
				}
					seventh.setNext(head);
					tail.setNext(seventh);
			}
			head=first;
			System.out.println("Integers in order after adding 69:");
			do {
				System.out.print(head.getItem() + " , ");
				head = head.getNext();
			}while(head != null);
			System.out.println();
			//second list
			SingleLinkedList<Integer> sll = new SingleLinkedList<Integer>();
			System.out.println(" calling is Empty() method: " + sll.isEmpty());
			sll.addNodeAtIndex(2, new Node <Integer> (616));
			sll.setHead(new Node<Integer>(313));
			for(int i = 0;i<5;++i)
				sll.addAtFront(new Node <Integer>((int)(10 * Math.random())));
			sll.addAtFront(new Node <Integer>(10));
			sll.addAtEnd(new Node <Integer>(69));
			sll.addNodeAtIndex(2,new Node <Integer>(101));
			sll.displayLinkedList();
			Node <Integer> n;
			n = sll.remove(new Node<Integer>(69));
			System.out.println("removed node containg Integer: " + n);
			n = sll.removeFromFront();
			System.out.println("removed node from front: " + n);
			n = sll.removeNodeAtIndex(0);
			System.out.println("removed node at index 0: " + n);
			n = sll.removeFromEnd();//this gave an error, so I wrapped it in try catch,to avoid errors but its unusable in this state.
			System.out.println("removed node from end: " + n );
			n = new Node<Integer>(101);
			int index = sll.findNodeIndex(n);
			System.out.println(" index of Node: " + n + " is: " + index);
			sll.displayLinkedList();
			n =sll.removeNodeAtIndex(22);
			System.out.println("Node at index 22: " +  n );
			System.out.println("sll.length: "+ sll.length());
			System.out.println("merged using class method");
			sll.merge(sortedSLL1).displayLinkedList();//this doesn't solve problem 1 
			sll.removeNodeAtIndex(1);//I removed these because I want 2 random numbers in my list not 4
			sll.removeNodeAtIndex(2);//this is also to show how the method handles 2 lists of different lengths
			//since the lists show after one another
			///Assignment 1
			System.out.println("\n\n\nAssignment1:\nlinked lists");
			System.out.println("list 1:");
			sortedSLL1.displayLinkedList();
			System.out.println("list 2:");
			sll.displayLinkedList();
			
			
			//problem 1 (method in single linked list class)
			System.out.println("\n problem 1\n\n \nmerged using problem 1 method");
			SingleLinkedList<Integer> sll3 = new SingleLinkedList<Integer>();
			sll3.mergeUnsortedLists(sortedSLL1, sll).displayLinkedList();
			//problem 2
			
			System.out.println(" \n\n\n\n");
			SingleLinkedList<Integer> sll12 = new SingleLinkedList<Integer>();
			System.out.println("Problem 2\n sourcelist");
			sortedSLL1.displayLinkedList();
			System.out.println("'\n new list 12 ");
			sll12.multiply(sortedSLL1).displayLinkedList();
			//problem 3// I will create new lists to test this
			System.out.println("problem 3");
			SingleLinkedList<Integer> tList1 = new SingleLinkedList<Integer>();
			SingleLinkedList<Integer> tList2 = new SingleLinkedList<Integer>();
			SingleLinkedList<Integer> tList3 = new SingleLinkedList<Integer>();
			tList1.addAtEnd(new Node<Integer>(0));
			tList1.addAtEnd(new Node<Integer>(1));
			tList1.addAtEnd(new Node<Integer>(2));
			tList1.addAtEnd(new Node<Integer>(3));
			tList1.addAtEnd(new Node<Integer>(4));
			tList1.addAtEnd(new Node<Integer>(5));
			tList1.addAtEnd(new Node<Integer>(6));
			//subset
			
			
			tList2.addAtEnd(new Node<Integer>(0));
			tList2.addAtEnd(new Node<Integer>(1));
			tList2.addAtEnd(new Node<Integer>(2));
			tList2.addAtEnd(new Node<Integer>(3));
			
			
			//notsubset
			tList3.addNodeInPlace(new Node<Integer>(0));
			tList3.addNodeInPlace(new Node<Integer>(1));
			tList3.addNodeInPlace(new Node<Integer>(2));
			tList3.addNodeInPlace(new Node<Integer>(7));
			boolean testbool= false;
			tList1.displayLinkedList();
			tList2.displayLinkedList();
			tList3.displayLinkedList();
			
			
			
			
			
			
			
			if(tList1.isSubset(tList1, tList2)) {
				System.out.println("list 2 is subset of 1");
			}else {
				System.out.println("list 2 is not subset of 1");
				
				}
			if(tList1.isSubset(tList1, tList3)) {
				System.out.println("list 3 is subset of 1");
			}else {
				System.out.println("list 3 is not subset of 1");
				
				}
			
System.out.println(" Palindrome tester");
System.out.println(" Enter your phrase (hit Enter key to quit)");

sll1.getPhrase(scan);
sll1.displayLinkedList();
while(!sll1.isEmpty()) {
	sll2.toLower(sll1);
	System.out.println("phrase in lowercase:");
	sll12.displayLinkedList();
	sll2R = (SingleLinkedList<Character>) sll2.copyList();
	sll2R.reverseList();
	if(sll2.equals(sll2R))
		System.out.println("phrase is palindrome");
	else
		System.out.println("phrase is NOT palindrome");
	sll1.getPhrase(scan);
}
System.out.println("Goodbye!");
	
	
	SingleLinkedList<Character> word1 = new SingleLinkedList<Character>();
	SingleLinkedList<Character> word2 = new SingleLinkedList<Character>();
	String line1, line2;
	System.out.println("Enterthe first word: ");
	line1 = scan.nextLine();
	for(int i = 0 ; i<line1.length(); i++)
		word1.addAtEnd(new Node<Character>(line1.charAt(i)));
	System.out.println("Enter the second word: ");
	line2 = scan.nextLine();
	for(int i = 0; i < line2.length(); i++)
		word2.addAtEnd(new Node<Character>(line2.charAt(i)));
	if(sll1.anagrams(word1,word2))
		System.out.println("\n\"" + line1 +" \" and \"" + line2 + "\" are anagrams." );

	if(word1.anagrams(word1,word2) || word2.anagrams(word1,word2) )
	System.out.println("\n\"" + line1 +" \" and \"" + line2 + "\" are anagrams." );
	else
	System.out.println("\n\""+ line1 + "\"and\"" + line2 + "\" are not anagrams.");
	scan.close();
}



}

//This problem still needs a scanner for the input and to edit the method to check all the nodes before breaking and returning false
