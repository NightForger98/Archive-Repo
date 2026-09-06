
//These are all the methods I learned from the linked list lecture, I will create my own methods below them.
//In problem 1 you asked us to create the merge method but that was already covered in the pdfs you sent
package LinkListDouble;

import java.util.Scanner;

public class SingleLinkedList <Item> {

private Node<Item> head;
private Node<Item> tail;
private Node<Item> first,last;
private int length;//size of the linked list
SingleLinkedList(){head = tail = null;}
SingleLinkedList(Node<Item> i){setHead(i);}
public boolean isEmpty() {return head == null;}
public void setHead (Node <Item> i) {
	if(i ==null)
		return;
	else if(isEmpty())
		head=tail=i;
	else {
		i.setNext(head);
		head=i;
	}
	++length;
}
public Node <Item> getHead(){return head;}
public int length() {return length;}
public void addAtFront (Node<Item> n) {setHead(n);}
public void addAtEnd(Node<Item> n) {
	if(isEmpty())
		setHead(n);
	else{n.setNext(null);
	tail.setNext(n);
	tail=n;
	++length;
	}
	
}
public void addNodeAtIndex(int i, Node <Item> n) {
	if(n == null)
		return;
	if(isEmpty() || i == 0) {
	System.out.println(" Node added to the front of the list");
	setHead(n);
	}	
	else if( i < length) {
		int counter= 1;
		Node<Item> current = head;
		while(counter++< i) {
			current = current.getNext();
			
		}
	n.setNext(current.getNext());
	current.setNext(n);
	++length;
	}
}
public int findNodeIndex(Node<Item> n) {
	if(isEmpty())
		return -1;
	Node<Item> current = head;
	int count = 0;
	while(current != null && current.getItem() != n.getItem()) {
		current = current.getNext();
		count++;
	}
	if(current == null)
	return -1;
	return count;
}
public Node<Item> remove(Node<Item> n){
	if(head== tail)
	return null;
int i = findNodeIndex(n);
if(i>=0)
	return removeNodeAtIndex(i);
return null;
}
public Node<Item> removeFromFront(){
	if(isEmpty())
		return null;
	Node<Item> current = head;
	head = head.getNext();
	--length;
	return current;
	
	}
public Node<Item> removeFromEnd(){
	if(isEmpty())
	return null;
	Node<Item> current = head;
	Node<Item> temp; 
	try {
	while(current.getNext() != tail){
		current=current.getNext();
}
	
	temp = tail;
	tail=current;
	tail.setNext(null);
	--length;
	
	return temp;	
	}catch(NullPointerException e) {
		System.out.println(" current is null error");
		return current;
	}
}
public Node<Item> removeNodeAtIndex(int i){
	if(isEmpty())
	return null;
	Node <Item> current = head;
	int counter = 1;
	if(i== 0)
		return removeFromFront();
	else if(i> 0 && i< length) {
		Node<Item> temp = current.getNext();
		while(counter<i) {
			current = current.getNext();
			temp = temp.getNext();
			counter++;
		}
		
	
	current.next = temp.next;
	temp.setNext(null);
	--length;
	return temp;
}
	else {
		System.out.println("Index: " + i + " Out of bounds.");
		return null;
	}
}
public void reverseList() {
	Node p1,p2,p3;
	if(isEmpty() || first.getNext() == null)
		return;
	p1=first;
	last= first;
	p2=p1.getNext();
	p1.setNext(null);
	while(p2 != null) {
		p3 =p2.getNext();
		p2.setNext(p1);
		p1=p2;
		p2 = p3;
	}
	first = p1;
}

public SingleLinkedList<Item> copyList(){
	SingleLinkedList<Item> temp = new SingleLinkedList<Item>();
	if(length()== 0)
		return null;
	Node <?> t = getHead();
	while (t != null) {
		temp.addAtEnd(new Node(t.getItem()));
		t = t.getNext();
	}
	return temp;
}
public boolean equals(SingleLinkedList<Item> that) {
	Node<Item>n1,n2;
	n1 = getHead();
	n2 = that.getHead();
	while (n1 != null && n2 != null) {
		if(n1.getItem() != n2.getItem())
				return false;
		n1 = n1.getNext();
		n2 = n2.getNext();
	}
	if(n1 != null || n2 != null)
		return false;
	return true;
}

public SingleLinkedList<?> merge(SingleLinkedList<Item> that){
	Node<Item> thisNode = getHead();
	Node<Item> thatNode = that.getHead();
	SingleLinkedList<Item> newMergedList = new SingleLinkedList<Item>();
while(thisNode != null && thatNode != null){
	if(thisNode.compareTo(thatNode)<0) {
		newMergedList.addAtEnd(new Node(thisNode.getItem()));
		thisNode =  thisNode.getNext();
	}
	else {
		newMergedList.addAtEnd(new Node(thatNode.getItem()));
		thatNode=thatNode.getNext();
	}
}
while(thisNode !=null) {
	newMergedList.addAtEnd(new Node(thisNode.getItem()));
	thisNode =  thisNode.getNext();
}
while(thatNode !=null) {
	newMergedList.addAtEnd(new Node(thatNode.getItem()));
thatNode =  thatNode.getNext();

}
return newMergedList;
}

public void addNodeInPlace(Node<Item> n) {
	Node<Item> prev, current;
	prev = null;
	current = getHead();
	while(current != null && n.compareTo(current)>0) {
		prev = current;
		current = current.getNext();
	}
	n.setNext(current);
	if(prev == null)
		head = n;
	else
		prev.setNext(n);
}

public void displayLinkedList() {
	Node<Item> current = head;
	while(current != null) {
		System.out.print(current.getItem()+ " ");
		current = current.getNext();
	}
	System.out.println();
}
@Override
public String toString() {

	return getClass()+"; length: "+ length();}

//Assignment 1
//The difference between Integer, Item, and <?> I guess abstract, still confuses me
// problem 1 //I still don't understand why this method has to be static 
public static SingleLinkedList mergeUnsortedLists(SingleLinkedList list1, SingleLinkedList list2) {
	Node A = list1.getHead();
	Node B = list2.getHead();
	SingleLinkedList list3 = new SingleLinkedList<Integer>();

do{
		if(A != null) {
			list3.addAtEnd(new Node(A.getItem()));
			A=A.getNext();
			}
		if(B != null) {
			list3.addAtEnd(new Node(B.getItem()));
			B=B.getNext();
		}
			
		else {}
	
	}while(A != null || B != null );
	return list3;

}

//problem 2// I don't have time to create error catchers, I'm aware that this will give an error if the node item  is not an Integer type
// I also have some questions for when I see you so I can do this better

public static SingleLinkedList multiply(SingleLinkedList list11) {
	SingleLinkedList list12 = new SingleLinkedList<Integer>();
	Node A = list11.getHead();
	list12.addAtEnd(new Node (A.getItem()));
	int temp1 ,temp2,tempA,tempB;
	Node B = new Node();
	temp1 = Integer.valueOf(A.getItem().toString());
	while(A.getNext() !=null ) {	
		temp2 = Integer.valueOf(A.getNext().getItem().toString());
		tempA = temp1 * temp2;
		B.setItem(tempA);
		A=A.getNext();
		list12.addAtEnd(new Node (B.getItem()));
		temp1=tempA;
		
	}
	
return list12;

}
//Problem 3

public static boolean isSubset (SingleLinkedList a, SingleLinkedList b) {
	Node A = a.getHead();
	Node B = b.getHead();
	boolean Eq=true;
	
	
	while(Eq == true && A != null ){
		Eq=A.equals(B);
		B=B.getNext();
		if(B.getNext() == null) {
		A=A.getNext();
		B=b.getHead();
		}}
	return Eq;
}

//palindrome method
public static SingleLinkedList<Character> getPhrase(Scanner in){
	SingleLinkedList<Character> phrase = 
			new SingleLinkedList<Character>();
	String line = in.nextLine();
	for (int i = 0; i < line.length(); ++i )
		phrase.addAtFront(new Node<Character>(line.charAt(i)));
	
	return phrase;
}
public static SingleLinkedList<Character> toLower(SingleLinkedList<Character> sll){
	SingleLinkedList<Character> word = 
			new SingleLinkedList<Character>();
	char c;
	Node<Character> crr = sll.getHead();
	while(crr != null) {
		c = crr.getItem();
		if(Character.isLetter(c))
			word.addAtEnd(new Node<Character>(Character.toLowerCase(c)));
		crr = crr.getNext();
	}
	return word;
}
public static boolean anagrams(SingleLinkedList<Character> w1,SingleLinkedList<Character>w2) {
	if(w1.length()!=w2.length()) {
		System.out.println("\nWords of diffrent length.");
		return false; 
	}
	Node <Character>curr1, curr2;
	int pos;
	boolean found;
	curr1 = w1.getHead();
	while(curr1 != null) {
		pos = 0;
		curr2 = w2.getHead();
		found = false;
		while(curr2 != null) {
			if(curr1.compareTo(curr2)== 0) {
				w2.removeNodeAtIndex(pos);
				found = true;
				break;
			}
			else {
				curr2 = curr2.next;
				pos++;
			}
		}
		if(!found)
			return false;
		curr1 = curr1.next;
		
	}
	if(w2.isEmpty())
		return true;
	return false;
}
}


