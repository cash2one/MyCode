import os

class ShortUID(object):

	def __init__(self, alphabet=None):
		if alphabet is None:
			alphabet = list("23456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"
							"acbdefghijklmnopqrstuvwxyz")
		self._alphabet = alphabet
		self.alpha_len = len(self._alphabet)

	def _num_to_string(self, number, pad_to_length=None):
		output = ""
		while number:
			number, digit = divmod(number, self._alpha_len)
			output += self._alphabet[digit]
		if pad_to_length:
			remainder = max(pad_to_length-len(output), 0)
			output = output + self._alphabet[0] * remainder
		return output

	def _string_to_int(self, string):
		number = 0
		for char in string[::-1]:
			number = number * self.alpha_len + self._alphabet.index(char)
		return number

_global_instance = ShortUID()
b57encode = _global_instance._num_to_string
b57decode = _global_instance._string_to_int
