package LinkListDouble;
import java.util.Iterator;
import java.util.NoSuchElementException;
public class GenericStackArray<Item> implements Iterable<Item> {
	private Item[] a;
	private int N;
	Node first;
	public GenericStackArray(int cap) {a = (Item[]) new Object[cap];}
	public boolean isEmpty() { return N == 0;}
	public int size() {return N;}
	private class ReverseArrayIterator {}
	public Iterator<Item> iterator(){return new ListIterator();}
	public void push(Item item) {
		if(N == a.length ) resize(2*a.length);
		a[N++] = item;
		
	}
	public Item pop() {
		Item item = a[--N];
		a[N] = null;
		if( N > 0 &&  N == a.length/4) resize(a.length/2);
		return item;}
	private void resize(int max) {
		Item[] temp = (Item[]) new Object[max];
		for (int i = 0; i < N;i++) temp[i] = a[i];
		a = temp;
		
	}
	public Item peek() {return a[N-1];}
	public static GenericStackArray<Character> convertToBase(int num, int b){
		GenericStackArray <Character> convNum= new GenericStackArray <Character> (10);
		Character []remainders = {'0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'};
		int remainder;
		while(num !=0) {
			remainder = num % b;
			convNum.push(remainders[remainder]);
			num /= b;
		}
		return convNum;
	}
	public static void printStack (GenericStackArray<Character> fcs) {
		while (!fcs.isEmpty()) {
			System.out.println(fcs.pop());
		}
		System.out.println();
	}
	private class ListIterator implements Iterator<Item>{
		private Node<Item> current = first;
		@Override
		public boolean hasNext() {return current != null;}
		@Override
		public void remove() {
			throw new UnsupportedOperationException();
		}
		@Override
		public Item next() {
			if (!hasNext())
				throw new NoSuchElementException();
			Item item = (Item) current.getItem();
			current = current.getNext();
			return item;
		}
		
		}
	

	
}
