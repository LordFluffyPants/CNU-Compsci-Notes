__author__ = 'Jake Hayhurst'

def ls(filenames):
    result = []
    result.append('------------------------------------------------------------')
    if len(filenames) == 0:
        return result
    filenames.sort()
    size = 0
    for i in filenames:
        if size < len(i):
            size = len(i)
    filenames = addSpacesAfter(filenames, size)
    emptyRows = createNewArray(findRows(filenames))
    populatedRows = populateRows(emptyRows, filenames)
    populatedRows = reduceCollumns(populatedRows)
    result += populatedRows
    return result

def addSpacesAfter(files, longestWord):
    newList = []
    for i in files:
        size = longestWord - len(i)
        item = i
        for j in range(size):
            item += ' '
        item += '  '
        newList.append(item)
    return newList

def findRows(files):
    max = 60
    rows = 1
    for i in files:
        if max < len(i) - 2:
            rows += 1
            max = 60 - len(i)
        else:
            max -= len(i)
    return rows

def createNewArray(rows):
    newList = []
    for i in range(rows):
        newList.append("")
    return newList

def populateRows(list, filenames):
    count = 0
    for i in filenames:
        if count < len(list):
            list[count] += i
            count += 1
        else:
            count = 0
            list[count] += i
            count += 1
    return list

def reduceCollumns(list):
    size = len(list[0])
    for i in range(len(list)):
        if size == len(list[i]):
            list[i] = list[i][0:len(list[i])-2:1]
    return list